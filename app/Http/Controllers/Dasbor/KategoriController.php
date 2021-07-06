<?php
/**
 * @author     Thank you for using localhost.test
 * @copyright  2020-2120
 * @link       https://localhost.test
 * @Help       We are always looking to improve our code. If you know better and more creative way don't hesitate to contact us. Thank you.
 */
namespace App\Http\Controllers\Dasbor;
use App\Http\Controllers\Controller;
use App\Models\Dasbor\Kategori;
use Illuminate\Http\Request;
use App\Http\Requests\Dasbor\KategoriRequest;
use Gate;

class KategoriController extends Controller
{

    public function index()
    {
        if (Gate::none(['kategori_allow', 'kategori_edit'])) {
            return redirect(route("dasbor.home"));
        }
        $admiko_data['sideBarActive'] = "kategori";
		$admiko_data["sideBarActiveFolder"] = "_opsi";

        $tableData = Kategori::orderByDesc("id")->get();
        return view("dasbor.kategori.index")->with(compact('admiko_data', "tableData"));
    }

    public function create()
    {
        if (Gate::none(['kategori_allow'])) {
            return redirect(route("dasbor.kategori.index"));
        }
        $admiko_data['sideBarActive'] = "kategori";
		$admiko_data["sideBarActiveFolder"] = "_opsi";
        $admiko_data['formAction'] = route("dasbor.kategori.store");


        return view("dasbor.kategori.manage")->with(compact('admiko_data'));
    }

    public function store(KategoriRequest $request)
    {
        if (Gate::none(['kategori_allow'])) {
            return redirect(route("dasbor.kategori.index"));
        }
        $data = $request->all();

        $Kategori = Kategori::create($data);

        return redirect(route("dasbor.kategori.index"));
    }

    public function show($id)
    {
        return back();
    }

    public function edit($id)
    {
        $Kategori = Kategori::find($id);
        if (Gate::none(['kategori_allow', 'kategori_edit']) || !$Kategori) {
            return redirect(route("dasbor.kategori.index"));
        }

        $admiko_data['sideBarActive'] = "kategori";
		$admiko_data["sideBarActiveFolder"] = "_opsi";
        $admiko_data['formAction'] = route("dasbor.kategori.update", [$Kategori->id]);


        $data = $Kategori;
        return view("dasbor.kategori.manage")->with(compact('admiko_data', 'data'));
    }

    public function update(KategoriRequest $request,$id)
    {
        if (Gate::none(['kategori_allow', 'kategori_edit'])) {
            return redirect(route("dasbor.kategori.index"));
        }
        $data = $request->all();
        $Kategori = Kategori::find($id);
        $Kategori->update($data);

        return redirect(route("dasbor.kategori.index"));
    }

    public function destroy(Request $request)
    {
        if (Gate::none(['kategori_allow'])) {
            return redirect(route("dasbor.kategori.index"));
        }

        Kategori::destroy($request->idDel);
        return back();
    }



}
