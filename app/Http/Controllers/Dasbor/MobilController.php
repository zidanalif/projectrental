<?php
/**
 * @author     Thank you for using localhost.test
 * @copyright  2020-2120
 * @link       https://localhost.test
 * @Help       We are always looking to improve our code. If you know better and more creative way don't hesitate to contact us. Thank you.
 */
namespace App\Http\Controllers\Dasbor;
use App\Http\Controllers\Controller;
use App\Models\Dasbor\Mobil;
use Illuminate\Http\Request;
use App\Http\Requests\Dasbor\MobilRequest;
use Gate;
use App\Models\Dasbor\Merek;
use App\Models\Dasbor\Kategori;

class MobilController extends Controller
{

    public function index()
    {
        if (Gate::none(['mobil_allow', 'mobil_edit'])) {
            return redirect(route("dasbor.home"));
        }
        $admiko_data['sideBarActive'] = "mobil";
		$admiko_data["sideBarActiveFolder"] = "";
        $admiko_data["fileInfo"] = Mobil::$admiko_file_info;
        $tableData = Mobil::orderByDesc("id")->get();
        return view("dasbor.mobil.index")->with(compact('admiko_data', "tableData"));
    }

    public function create()
    {
        if (Gate::none(['mobil_allow'])) {
            return redirect(route("dasbor.mobil.index"));
        }
        $admiko_data['sideBarActive'] = "mobil";
		$admiko_data["sideBarActiveFolder"] = "";
        $admiko_data['formAction'] = route("dasbor.mobil.store");
        $admiko_data["fileInfo"] = Mobil::$admiko_file_info;

		$merek_all = Merek::all()->pluck("merek", "id")->sortBy("merek");
		$kategori_all = Kategori::all()->pluck("kategori", "id")->sortBy("kategori");
		$bahan_bakar_all = Mobil::BAHAN_BAKAR_CONS;
		$fitur_all = Mobil::FITUR_CONS;
        return view("dasbor.mobil.manage")->with(compact('admiko_data','merek_all','kategori_all','bahan_bakar_all','fitur_all'));
    }

    public function store(MobilRequest $request)
    {
        if (Gate::none(['mobil_allow'])) {
            return redirect(route("dasbor.mobil.index"));
        }
        $data = $request->all();

        $Mobil = Mobil::create($data);
        $Mobil->fitur_many()->sync($request->input("fitur", []));
        return redirect(route("dasbor.mobil.index"));
    }

    public function show($id)
    {
        return back();
    }

    public function edit($id)
    {
        $Mobil = Mobil::find($id);
        if (Gate::none(['mobil_allow', 'mobil_edit']) || !$Mobil) {
            return redirect(route("dasbor.mobil.index"));
        }

        $admiko_data['sideBarActive'] = "mobil";
		$admiko_data["sideBarActiveFolder"] = "";
        $admiko_data['formAction'] = route("dasbor.mobil.update", [$Mobil->id]);
        $admiko_data["fileInfo"] = Mobil::$admiko_file_info;

		$merek_all = Merek::all()->pluck("merek", "id")->sortBy("merek");
		$kategori_all = Kategori::all()->pluck("kategori", "id")->sortBy("kategori");
		$bahan_bakar_all = Mobil::BAHAN_BAKAR_CONS;
		$fitur_all = Mobil::FITUR_CONS;
        $data = $Mobil;
        return view("dasbor.mobil.manage")->with(compact('admiko_data', 'data','merek_all','kategori_all','bahan_bakar_all','fitur_all'));
    }

    public function update(MobilRequest $request,$id)
    {
        if (Gate::none(['mobil_allow', 'mobil_edit'])) {
            return redirect(route("dasbor.mobil.index"));
        }
        $data = $request->all();
        $Mobil = Mobil::find($id);
        $Mobil->update($data);
        $Mobil->fitur_many()->sync($request->input("fitur", []));
        return redirect(route("dasbor.mobil.index"));
    }

    public function destroy(Request $request)
    {
        if (Gate::none(['mobil_allow'])) {
            return redirect(route("dasbor.mobil.index"));
        }

        Mobil::destroy($request->idDel);
        return back();
    }

    public function admiko_many_files_store(Request $request)
    {
        if(Gate::none(['mobil_allow'])) { return redirect(route("dasbor.mobil")); };
        if($request->hasFile("foto")) {
            $data = $request->all();
            Mobil::create($data);
        }

    }


}
