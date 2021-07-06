<?php
/**
 * @author     Thank you for using localhost.test
 * @copyright  2020-2120
 * @link       https://localhost.test
 * @Help       We are always looking to improve our code. If you know better and more creative way don't hesitate to contact us. Thank you.
 */
namespace App\Http\Controllers\Dasbor;
use App\Http\Controllers\Controller;
use App\Models\Dasbor\Testimoni;
use Illuminate\Http\Request;
use App\Http\Requests\Dasbor\TestimoniRequest;
use Gate;
use App\Models\Dasbor\Klien;

class TestimoniController extends Controller
{

    public function index()
    {
        if (Gate::none(['testimoni_allow', 'testimoni_edit'])) {
            return redirect(route("dasbor.home"));
        }
        $admiko_data['sideBarActive'] = "testimoni";
		$admiko_data["sideBarActiveFolder"] = "";

        $tableData = Testimoni::orderByDesc("id")->get();
        return view("dasbor.testimoni.index")->with(compact('admiko_data', "tableData"));
    }

    public function create()
    {
        if (Gate::none(['testimoni_allow'])) {
            return redirect(route("dasbor.testimoni.index"));
        }
        $admiko_data['sideBarActive'] = "testimoni";
		$admiko_data["sideBarActiveFolder"] = "";
        $admiko_data['formAction'] = route("dasbor.testimoni.store");


		$klien_all = Klien::all()->pluck("nama", "id")->sortBy("nama");
		$rating_all = Testimoni::RATING_CONS;
        return view("dasbor.testimoni.manage")->with(compact('admiko_data','klien_all','rating_all'));
    }

    public function store(TestimoniRequest $request)
    {
        if (Gate::none(['testimoni_allow'])) {
            return redirect(route("dasbor.testimoni.index"));
        }
        $data = $request->all();

        $Testimoni = Testimoni::create($data);

        return redirect(route("dasbor.testimoni.index"));
    }

    public function show($id)
    {
        return back();
    }

    public function edit($id)
    {
        $Testimoni = Testimoni::find($id);
        if (Gate::none(['testimoni_allow', 'testimoni_edit']) || !$Testimoni) {
            return redirect(route("dasbor.testimoni.index"));
        }

        $admiko_data['sideBarActive'] = "testimoni";
		$admiko_data["sideBarActiveFolder"] = "";
        $admiko_data['formAction'] = route("dasbor.testimoni.update", [$Testimoni->id]);


		$klien_all = Klien::all()->pluck("nama", "id")->sortBy("nama");
		$rating_all = Testimoni::RATING_CONS;
        $data = $Testimoni;
        return view("dasbor.testimoni.manage")->with(compact('admiko_data', 'data','klien_all','rating_all'));
    }

    public function update(TestimoniRequest $request,$id)
    {
        if (Gate::none(['testimoni_allow', 'testimoni_edit'])) {
            return redirect(route("dasbor.testimoni.index"));
        }
        $data = $request->all();
        $Testimoni = Testimoni::find($id);
        $Testimoni->update($data);

        return redirect(route("dasbor.testimoni.index"));
    }

    public function destroy(Request $request)
    {
        if (Gate::none(['testimoni_allow'])) {
            return redirect(route("dasbor.testimoni.index"));
        }

        Testimoni::destroy($request->idDel);
        return back();
    }



}
