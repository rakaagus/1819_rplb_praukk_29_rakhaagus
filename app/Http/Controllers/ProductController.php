<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
Use Alert;


class ProductController extends Controller
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
        }
        $products = Product::all();
        return view('data-admin.data-products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        if (Gate::allows('pelanggan')) {
            return abort(403,'Anda Tidak Memiliki Hak Akses!');
        }

        $product = Product::all();
        $category = Category::all();
        return view('data-admin.data-products.create', compact('product', 'category'));
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
            'category_id' => 'required',
            'harga' => 'required|numeric',
            'is_ready' => 'required',
            'jenis' => 'required',
            'gambar' => 'required'
        ]);

        if($this->validasi->fails()){
            Alert::warning('Gagal', 'Masukan Data Dengan Benar!');
            return back();
        }

        $product = $request->gambar;
        $namaFile = $product->getClientOriginalName();

            $setProduct = new Product;
            $setProduct->category_id = $request->category_id;
            $setProduct->harga = $request->harga;
            $setProduct->nama = $request->nama;
            $setProduct->is_ready = $request->is_ready;
            $setProduct->jenis = $request->jenis;
            $setProduct->gambar = $namaFile;

        $product->move(public_path().'/assets/img/product',$namaFile);
        $setProduct->save();
        
        Alert::success('Berhasil', 'Tambah Data Berhasil');
        return redirect('/dashboard-product');
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
        if (Gate::allows('pelanggan')) {
            return abort(403,'Anda Tidak Memiliki Hak Akses!');
        }

        $product = Product::find($id);
        $category = Category::all();
        return view('data-admin.data-products.show', compact('product', 'category'));
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

        $product = Product::find($id);
        $categories = Category::all();
        return view('data-admin.data-products.edit', compact('product', 'categories'));
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
        if (Gate::allows('pelanggan')) {
            return abort(403,'Anda Tidak Memiliki Hak Akses!');
        }

        $validasi = $request->validate([
            'category_id' => 'required',
            'harga' => 'required|numeric',
            'is_ready' => 'required',
            'jenis' => 'required'
        ]);

        if($this->validasi->fails()){
            Alert::warning('Gagal', 'Masukan Data Dengan Benar!');
            return back();
        }

        //mencari id dari tabel product
        $product = Product::findorfail($id);

        //mengecheck apakah request gambar ada file yang dikirm
        if($request->hasFile('gambar')){
            //jika ada maka lakukan perintah update tabel product dengan field gambar sekali

            //variabel awal di indentifikasi dengan nama asli(extension) dari gambar yang dikirim
            $awal = $request->file('gambar')->getClientOriginalName();

            //mengabungkan semua field yang akan diupdate
            $data = [
                'category_id' => $request['category_id'],
                'harga' => $request['harga'],
                'jenis' => $request['jenis'],
                'nama' => $request['nama'],
                'is_ready' => $request['is_ready'],
                'gambar' => $awal
            ];
            //pindahkan file dari request gambar ke folder pulic/assets/img/product dengan nama dari variabel awal
            $request->gambar->move(public_path().'/assets/img/product', $awal);

            //update data
            $product->update($data);
        }

        //jika tidak ada file yang dikirmkan maka lakukan perintah update tanpa field gambar

        //kumpulkan semua data field yang akan diupdate kecuali gambar
        $data = [
            'category_id' => $request['category_id'],
            'harga' => $request['harga'],
            'jenis' => $request['jenis'],
            'nama' => $request['nama'],
            'is_ready' => $request['is_ready']
        ];

        //update tabel product
        $product->update($data);

        Alert::success('Berhasil!', 'Update Data Berhasil');
        return redirect('/dashboard-product');
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
        }

        $product = Product::findorfail($id);
        $file = public_path('assets/img/product').$product->gambar;
        //cek jika ada gambar
        if (file_exists($file)){
            //maka hapus file didalam folder public/assets/img/upload
            @unlink($file);
        }
        //hapus Data
        $product->delete();

        Alert::success('Berhasil!', 'Hapus Data Berhasil!');
        return back();
    }
}
