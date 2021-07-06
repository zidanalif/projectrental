<?php
/**
 * @author     Thank you for using localhost.test
 * @copyright  2020-2120
 * @link       https://localhost.test
 * @Help       We are always looking to improve our code. If you know better and more creative way don't hesitate to contact us. Thank you.
 */
namespace App\Http\Controllers\Dasbor;
use App\Http\Controllers\Controller;
use App\Models\Dasbor\Merek;
use Illuminate\Http\Request;
use App\Http\Requests\Dasbor\MerekRequest;
use Gate;

class MerekController extends Controller
{

    public function index()
    {
        if (Gate::none(['merek_allow', 'merek_edit'])) {
            return redirect(route("dasbor.home"));
        }
        $admiko_data['sideBarActive'] = "merek";
		$admiko_data["sideBarActiveFolder"] = "_opsi";

        $tableData = Merek::orderByDesc("id")->get();
        return view("dasbor.merek.index")->with(compact('admiko_data', "tableData"));
    }

    public function create()
    {
        if (Gate::none(['merek_allow'])) {
            return redirect(route("dasbor.merek.index"));
        }
        $admiko_data['sideBarActive'] = "merek";
		$admiko_data["sideBarActiveFolder"] = "_opsi";
        $admiko_data['formAction'] = route("dasbor.merek.store");


		$manufaktur_all = Merek::MANUFAKTUR_CONS;
        return view("dasbor.merek.manage")->with(compact('admiko_data','manufaktur_all'));
    }

    public function store(MerekRequest $request)
    {
        if (Gate::none(['merek_allow'])) {
            return redirect(route("dasbor.merek.index"));
        }
        $data = $request->all();

        $Merek = Merek::create($data);

        return redirect(route("dasbor.merek.index"));
    }

    public function show($id)
    {
        return back();
    }

    public function edit($id)
    {
        $Merek = Merek::find($id);
        if (Gate::none(['merek_allow', 'merek_edit']) || !$Merek) {
            return redirect(route("dasbor.merek.index"));
        }

        $admiko_data['sideBarActive'] = "merek";
		$admiko_data["sideBarActiveFolder"] = "_opsi";
        $admiko_data['formAction'] = route("dasbor.merek.update", [$Merek->id]);


		$manufaktur_all = Merek::MANUFAKTUR_CONS;
        $data = $Merek;
        return view("dasbor.merek.manage")->with(compact('admiko_data', 'data','manufaktur_all'));
    }

    public function update(MerekRequest $request,$id)
    {
        if (Gate::none(['merek_allow', 'merek_edit'])) {
            return redirect(route("dasbor.merek.index"));
        }
        $data = $request->all();
        $Merek = Merek::find($id);
        $Merek->update($data);

        return redirect(route("dasbor.merek.index"));
    }

    public function destroy(Request $request)
    {
        if (Gate::none(['merek_allow'])) {
            return redirect(route("dasbor.merek.index"));
        }

        Merek::destroy($request->idDel);
        return back();
    }



}
