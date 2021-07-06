<?php
/**
 * @author     Thank you for using localhost.test
 * @copyright  2020-2120
 * @link       https://localhost.test
 * @Help       We are always looking to improve our code. If you know better and more creative way don't hesitate to contact us. Thank you.
 */
namespace App\Http\Controllers\Dasbor;
use App\Http\Controllers\Controller;
use App\Models\Dasbor\Klien;
use Illuminate\Http\Request;
use App\Http\Requests\Dasbor\KlienRequest;
use Gate;

class KlienController extends Controller
{

    public function index()
    {
        if (Gate::none(['klien_allow', 'klien_edit'])) {
            return redirect(route("dasbor.home"));
        }
        $admiko_data['sideBarActive'] = "klien";
		$admiko_data["sideBarActiveFolder"] = "";
        $admiko_data["fileInfo"] = Klien::$admiko_file_info;
        $tableData = Klien::orderByDesc("id")->get();
        return view("dasbor.klien.index")->with(compact('admiko_data', "tableData"));
    }

    public function create()
    {
        if (Gate::none(['klien_allow'])) {
            return redirect(route("dasbor.klien.index"));
        }
        $admiko_data['sideBarActive'] = "klien";
		$admiko_data["sideBarActiveFolder"] = "";
        $admiko_data['formAction'] = route("dasbor.klien.store");
        $admiko_data["fileInfo"] = Klien::$admiko_file_info;

		$jenis_kelamin_all = Klien::JENIS_KELAMIN_CONS;
        return view("dasbor.klien.manage")->with(compact('admiko_data','jenis_kelamin_all'));
    }

    public function store(KlienRequest $request)
    {
        if (Gate::none(['klien_allow'])) {
            return redirect(route("dasbor.klien.index"));
        }
        $data = $request->all();

        $Klien = Klien::create($data);

        return redirect(route("dasbor.klien.index"));
    }

    public function show($id)
    {
        return back();
    }

    public function edit($id)
    {
        $Klien = Klien::find($id);
        if (Gate::none(['klien_allow', 'klien_edit']) || !$Klien) {
            return redirect(route("dasbor.klien.index"));
        }

        $admiko_data['sideBarActive'] = "klien";
		$admiko_data["sideBarActiveFolder"] = "";
        $admiko_data['formAction'] = route("dasbor.klien.update", [$Klien->id]);
        $admiko_data["fileInfo"] = Klien::$admiko_file_info;

		$jenis_kelamin_all = Klien::JENIS_KELAMIN_CONS;
        $data = $Klien;
        return view("dasbor.klien.manage")->with(compact('admiko_data', 'data','jenis_kelamin_all'));
    }

    public function update(KlienRequest $request,$id)
    {
        if (Gate::none(['klien_allow', 'klien_edit'])) {
            return redirect(route("dasbor.klien.index"));
        }
        $data = $request->all();
        $Klien = Klien::find($id);
        $Klien->update($data);

        return redirect(route("dasbor.klien.index"));
    }

    public function destroy(Request $request)
    {
        if (Gate::none(['klien_allow'])) {
            return redirect(route("dasbor.klien.index"));
        }

        Klien::destroy($request->idDel);
        return back();
    }



}
