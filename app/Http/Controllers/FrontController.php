<?php

namespace App\Http\Controllers;
use App\Models\Dasbor\Kategori;
use Illuminate\Http\Request;
use App\Http\Requests\Dasbor\KategoriRequest;
use Gate;

class FrontController extends Controller
{
    public function index()
    {
        $tableData = Kategori::orderByDesc("id")->get();
        return view('front.index')->with(compact('tableData'));
    }
    public function list()
    {
        return view('front.car-list');
    }
}
