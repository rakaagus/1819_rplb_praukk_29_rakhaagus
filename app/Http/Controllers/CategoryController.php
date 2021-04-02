<?php

namespace App\Http\Controllers;

use App\Category;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\CategoryImport;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
Use Alert;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        //
        if (Gate::allows('pelanggan')) {
            return abort(403,'Anda Tidak Memiliki Hak Akses!');
        }elseif(Gate::allows('waiter')) {
            return abort(403,'Anda Tidak Memiliki Hak Akses!');
        }

        $category = Category::paginate(10)->all();
        return view('data-admin.data-category.index', compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        if (Gate::allows('pelanggan')) {
            return abort(403,'Anda Tidak Memiliki Hak Akses!');
        }
        
        $validasi = $request->validate([
            'nama' => 'required|max:150'
        ]);

        if($validasi->fails()){
            Alert::warning('Gagal', 'Masukan Data Dengan Benar!');
            return back();
        }

        $category = Category::create($request->all());

        Alert::success('Berhasil', 'Tambah Data Berhasil');
        return redirect('/category');
    }

    public function import(Request $request){

        if (Gate::allows('pelanggan')) {
            return abort(403,'Anda Tidak Memiliki Hak Akses!');
        }

        $request->validate([
            'excel' => 'required|file'
        ]);

        Excel::import(new CategoryImport, $request->file('excel'));

        return redirect('/category');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        if (Gate::allows('pelanggan')) {
            return abort(403,'Anda Tidak Memiliki Hak Akses!');
        }

        $category = Category::find($id);
        return view('data-admin.data-category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        if (Gate::allows('pelanggan')) {
            return abort(403,'Anda Tidak Memiliki Hak Akses!');
        }

        $category = Category::find($id);

        $validasi = $request->validate([
            'nama' => 'required|max:150'
        ]);

        if($validasi->fails()){
            Alert::error('Error', 'Masukan Data Dengan Benar');
            return back();
        }

        $category->update($request->all());
        Alert::success('Berhasil', 'Edit Data Berhasil');
        return redirect('/category');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        if (Gate::allows('pelanggan')) {
            return abort(403,'Anda Tidak Memiliki Hak Akses!');
        }elseif(Gate::allows('kasir')){
            return abort(403,'Anda Tidak Memiliki Hak Akses!');
        }elseif(Gate::allows('waiter')){
            return abort(403,'Anda Tidak Memiliki Hak Akses!');
        }
        $category = Category::find($id);
        $category->delete();
        return redirect('/category')->with('success', 'Data Berhasil Dihapus');
    }
}
