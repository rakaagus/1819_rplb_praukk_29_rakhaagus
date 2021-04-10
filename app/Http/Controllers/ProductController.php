<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
Use Alert;
use App\Activitylog;


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
        }else{
            $products = Product::all();
            return view('waiter-kasir.data-products.index', compact('products'));
        }
        
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
        } elseif (Gate::allows('owner')){
            return abort(403,'Anda Tidak Memiliki Hak Akses!');
        }else{
            $product = Product::all();
            $category = Category::all();
            return view('waiter-kasir.data-products.create', compact('product', 'category'));
        } 
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
        } elseif(Gate::allows('owner')){
            return abort(403,'Anda Tidak Memiliki Hak Akses!');
        }else{
            $messages = [  
                'category.required' => 'Masukan Category Prodcut',
                'harga.required.numeric' => 'Masukan Harga Product',
                'is_ready.required' => 'Masukan Status Product',
                'jenis.required' => 'Masukan Jenis Product',
                'nama.required' => 'Masukan Nama Product' 
            ];
    
            $validator = Validator::make($request->all(), [
                'category_id' => 'required',
                'harga' => 'required|numeric',
                'is_ready' => 'required',
                'jenis' => 'required',
                'nama' => 'required',
            ], $messages);
    
            if($validator->fails()){
                Alert::error('Gagal', $validator->messages()->all()[0]);
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
        } elseif(Gate::allows('pelanggan')){
            return abort(403,'Anda Tidak Memiliki Hak Akses!');
        }else {
            $product = Product::find($id);
            $category = Category::all();
            return view('waiter-kasir.data-products.show', compact('product', 'category'));
        }

        
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
        } elseif(Gate::allows('owner')){
            return abort(403,'Anda Tidak Memiliki Hak Akses!');
        }else{
            $product = Product::find($id);
            $categories = Category::all();
            return view('waiter-kasir.data-products.edit', compact('product', 'categories'));
        }

        
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

        }elseif(Gate::allows('owner')){

            return abort(403,'Anda Tidak Memiliki Hak Akses!');

        }else {

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
        }elseif(Gate::allows('owner')){
            return abort(403,'Anda Tidak Memiliki Hak Akses!');
        } else{

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
}
