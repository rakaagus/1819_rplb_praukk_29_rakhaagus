<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Pesanan;
use Illuminate\Support\Facades\Auth;
use App\PesananDetail;
use App\User;

class PesananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $psn;
    public function index()
    {
        //
        $this->psn = Pesanan::where('user_id', Auth::user()->id)->where('status', '!=', 0)->get();
        $user = User::all();
        $pesanan = Pesanan::all();
        // $pesanan_detail = PesananDetail::all();
        $jumlah_pesanan = PesananDetail::where('status', 0)->count();
        $status = PesananDetail::where('status', 1)->count();

        // $this->psn = Pesanan::where('user_id', Auth::user()->id)->first();
        // $this->psn_detail = PesananDetail('pesanan_id', $this->psn->id)->get();
        // $pesanan_modal = PesananDetail::all();
        return view('data-admin.data-pesanan.index', [
            'pesanans' => $pesanan,
            'pesanan' => $this->psn,
            'user' => $user,
            'jumlah_pesanan' => $jumlah_pesanan,
            'status' => $status,
        ]);
    }
    public function statusOnchange(Request $request, $id)
    {
        DB::select("CALL update_status_pesanan_detail($id, '$request->status')");
        return redirect()->back();
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
