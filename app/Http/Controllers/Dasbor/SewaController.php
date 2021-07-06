<?php
/**
 * @author     Thank you for using localhost.test
 * @copyright  2020-2120
 * @link       https://localhost.test
 * @Help       We are always looking to improve our code. If you know better and more creative way don't hesitate to contact us. Thank you.
 */
namespace App\Http\Controllers\Dasbor;
use App\Http\Controllers\Controller;
use App\Models\Dasbor\Sewa;
use Illuminate\Http\Request;
use App\Http\Requests\Dasbor\SewaRequest;
use Gate;
use App\Models\Dasbor\Klien;
use App\Models\Dasbor\Mobil;

class SewaController extends Controller
{

    public function index()
    {
        if (Gate::none(['sewa_allow', 'sewa_edit'])) {
            return redirect(route("dasbor.home"));
        }
        $admiko_data['sideBarActive'] = "sewa";
		$admiko_data["sideBarActiveFolder"] = "";

        $tableData = Sewa::orderByDesc("id")->get();
        return view("dasbor.sewa.index")->with(compact('admiko_data', "tableData"));
    }

    public function create()
    {
        if (Gate::none(['sewa_allow'])) {
            return redirect(route("dasbor.sewa.index"));
        }
        $admiko_data['sideBarActive'] = "sewa";
		$admiko_data["sideBarActiveFolder"] = "";
        $admiko_data['formAction'] = route("dasbor.sewa.store");


		$klien_all = Klien::all()->pluck("nama", "id")->sortBy("nama");
		$mobil_all = Mobil::all()->pluck("nama_mobil", "id")->sortBy("nama_mobil");
		$status_sewa_all = Sewa::STATUS_SEWA_CONS;
        return view("dasbor.sewa.manage")->with(compact('admiko_data','klien_all','mobil_all','status_sewa_all'));
    }

    public function store(SewaRequest $request)
    {
        if (Gate::none(['sewa_allow'])) {
            return redirect(route("dasbor.sewa.index"));
        }
        $data = $request->all();

        $Sewa = Sewa::create($data);

        return redirect(route("dasbor.sewa.index"));
    }

    public function show($id)
    {
        return back();
    }

    public function edit($id)
    {
        $Sewa = Sewa::find($id);
        if (Gate::none(['sewa_allow', 'sewa_edit']) || !$Sewa) {
            return redirect(route("dasbor.sewa.index"));
        }

        $admiko_data['sideBarActive'] = "sewa";
		$admiko_data["sideBarActiveFolder"] = "";
        $admiko_data['formAction'] = route("dasbor.sewa.update", [$Sewa->id]);


		$klien_all = Klien::all()->pluck("nama", "id")->sortBy("nama");
		$mobil_all = Mobil::all()->pluck("nama_mobil", "id")->sortBy("nama_mobil");
		$status_sewa_all = Sewa::STATUS_SEWA_CONS;
        $data = $Sewa;
        return view("dasbor.sewa.manage")->with(compact('admiko_data', 'data','klien_all','mobil_all','status_sewa_all'));
    }

    public function update(SewaRequest $request,$id)
    {
        if (Gate::none(['sewa_allow', 'sewa_edit'])) {
            return redirect(route("dasbor.sewa.index"));
        }
        $data = $request->all();
        $Sewa = Sewa::find($id);
        $Sewa->update($data);

        return redirect(route("dasbor.sewa.index"));
    }

    public function destroy(Request $request)
    {
        if (Gate::none(['sewa_allow'])) {
            return redirect(route("dasbor.sewa.index"));
        }

        Sewa::destroy($request->idDel);
        return back();
    }



}
