<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    //
    public function index()
    {
        return view('data-admin.index');
    }
    public function login()
    {
        return view('data-auth.login');
    }
    public function register()
    {
        return view('data-auth.register');
    }
    public function order()
    {
        return view('data-admin.order.index');
    }
    public function transaksi()
    {
        return view('data-admin.transaksi.index');
    }
    public function home()
    {
        return view('data-pelanggan.index');
    }
    public function menu()
    {
        return view('data-admin.menu.index');
    }
}
