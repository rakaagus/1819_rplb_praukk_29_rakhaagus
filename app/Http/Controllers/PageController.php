<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\User;
use App\Product;
use App\PesananDetail;
use App\Transaction;


class PageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $user = User::all()->count();
        $product = Product::all()->count();
        $pesananDetail = PesananDetail::where('status', 0)->count();
        $transaksi = Transaction::where('status', 0)->count();

        if(Gate::allows('admin')){
            return view('data-admin.index', compact('user', 'product', 'pesananDetail', 'transaksi'));

        } elseif(Gate::allows('pelanggan')){
            return redirect('/');

        }elseif(Gate::allows('waiter')){
            return view('waiter-kasir.index', compact('user', 'product', 'pesananDetail', 'transaksi'));

        }elseif(Gate::allows('kasir')){
            return view('waiter-kasir.index',compact('user', 'product', 'pesananDetail', 'transaksi'));
        }elseif(Gate::allows('owner')){
            return view('data-owner.index',compact('user', 'product', 'pesananDetail', 'transaksi'));
        }else{
            return abort(404);
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
    }
}
