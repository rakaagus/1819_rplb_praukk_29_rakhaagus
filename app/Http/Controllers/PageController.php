<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    //
    public function index()
    {
        return view('admin.index');
    }
    public function login()
    {
        return view('auth.login');
    }
    public function register()
    {
        return view('auth.register');
    }
    public function order()
    {
        return view('admin.order.index');
    }
    public function transaksi()
    {
        return view('admin.transaksi.index');
    }
    public function home()
    {
        return view('pelanggan.landing');
    }
}
