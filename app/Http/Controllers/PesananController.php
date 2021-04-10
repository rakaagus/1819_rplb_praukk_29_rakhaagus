<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Pesanan;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use App\Transaction;
use App\Activitylog;
use App\PesananDetail;
use App\PesananLunas;
use App\TransaksiLunas;
use App\User;
use Alert;
use PDF;

class PesananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $psn;
    public $bayar;
    
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

        // $this->psn = Pesanan::where('user_id', Auth::user()->id)->where('status', '!=', 0)->get();
        $user = User::all();
        $pesanan = Pesanan::all();
        $jumlah_pesanan = PesananDetail::where('status', 0)->count();
        $status = PesananDetail::where('status', 1)->count();

        // $id_pesanan = $pesanan['id'];
        // $pesanan_details = PesananDetail::where('pesanan_id', $id_pesanan)->get()->first();

        return view('waiter-kasir.data-pesanan.index', [
            'pesanans' => $pesanan,
            // 'pesanan_details' => $pesanan_details,
            'user' => $user,
            'jumlah_pesanan' => $jumlah_pesanan,
            'status' => $status,
        ]);
    }
    public function statusOnchange(Request $request, $id)
    {
        if (Gate::allows('pelanggan')) {

            return abort(403,'Anda Tidak Memiliki Hak Akses!');

        } elseif(Gate::allows('owner')){

            return abort(403,'Anda Tidak Memiliki Hak Akses!');

        } else{

            DB::select("CALL update_status_pesanan_detail($id, '$request->status')");
            Alert::success('Berhasil', 'Berhasil Ubah Data Pesanan');
            return redirect()->back();

        }

        
    }

    public function transaksi()
    {
        $pesanan = Pesanan::where('status', 1)->get();
        return view('waiter-kasir.data-transaksi.index', compact('pesanan'));
    }

    public function cekTransaksi(Request $request){

            if (Gate::allows('pelanggan')) {
                return abort(403,'Anda Tidak Memiliki Hak Akses!');
            }

            $pesanan = Pesanan::where('kode_pemesanan', $request->kode)->get()->first();
            
            if($pesanan == false) {

                Alert::warning('Perhatian', 'kode Pemesanan Ini Tidak Ada');

                return back();
            }else {

                $jumlah = $pesanan->total_harga;
                // $kode_unik = $pesanan->kode_unik;
                $pajak = $jumlah * 3/100;
                $id_pesanan = $pesanan['id'];
                $detail_transaksi = Transaction::where('pesanan_id', $id_pesanan)->get()->first();
                $detail_pesanan = PesananDetail::where('pesanan_id', $id_pesanan)->get();
                //pemakain function disini
                $bayar = DB::select('SELECT total_harga(' . $jumlah . ',' . $pajak . ') AS total_harga')[0]->total_harga;

                if ($detail_transaksi->status == 1) {

                    Alert::warning('Perhatian', 'Nomor ID Pesanan Ini Udah dibayar');

                    return back();
                } else {

                    return view('waiter-kasir.data-transaksi.index', compact('detail_transaksi', 'detail_pesanan', 'pesanan','pajak', 'bayar'));
                }
            } 
    }

    public function kembalian(Request $request)
    {

        $kembali = $request->bayar - $request->total_bayar;

        return response()->json($kembali);
    }

    public function bayar(Request $request, $id){

        if (Gate::allows('pelanggan')) {
            return abort(403,'Anda Tidak Memiliki Hak Akses!');
        }
        DB::beginTransaction();

        $transaksi = Transaction::find($id);
        $pesanan_id = Pesanan::where('id', $transaksi->pesanan_id)->get()->first();
        $id_pesanan = $pesanan_id['id'];
        $details = PesananDetail::where('pesanan_id', $id_pesanan)->get();
        
        $jumlah = $pesanan_id->total_harga;
        $pajak = $jumlah + 3/100;
        $data = [
            'total_bayar' => $request['total_bayar'],
            'jumlah_bayar' => $request['jumlah_bayar'],
            'kembalian' => $request['kembalian'],
            'status' => 1
        ];

        $dataPesanan = [
            'status' => 2
        ];

        try {
            $transaksi->update($data);
            $pesanan_id->update($dataPesanan);

            Activitylog::create([
                'nama_log'  => 'BAYAR',
                'deskripsi' => 'Membayar Transaksi Pesanan',
                'tabel' => 'Transaksi dan Pesanan',
                'referensi_id' => $transaksi->id,
                'user_id' => $transaksi->user_id,
                'new_item' => '-',
                'old_item' => '-'
            ]);

            DB::commit();
        } catch (Exception $e){
            DB::rollBack();
        }

        if($request->jumlah_bayar < $request->total_bayar){
            DB::rollBack();
            Alert::error('Gagal', 'Masukan Jumlah Uang Dengan Benar');
            return back();
        }

        if (empty($e)) {

            Alert::success('Berhasil', 'Berhasil Melakukan Pembayaran');
            return view('waiter-kasir.data-transaksi.lunas', compact('transaksi', 'pesanan_id', 'details', 'pajak'));
        } else {

            Alert::warning('Gagal', 'Gagal Melakukan Pembayaran');
            return view('waiter-kasir.data-transaksi.index');
        }
    }
    
    public function pdf_transaksi($id){
        if (Gate::allows('pelanggan')) {
            return abort(403,'Anda Tidak Memiliki Hak Akses!');
        }
        
        $transaksi = Transaction::find($id);
        $pesanan_id = Pesanan::where('id', $transaksi->pesanan_id)->get()->first();
        $id_pesanan = $pesanan_id['id'];
        $details = PesananDetail::where('pesanan_id', $id_pesanan)->get();

        $jumlah = $pesanan_id->total_harga;
        $pajak = $jumlah + 3/100;

        $pdf = PDF::loadView('waiter-kasir.data-transaksi.pdf', compact('transaksi', 'pesanan_id', 'details', 'pajak'))->setPaper('a4', 'potrait');
        return $pdf->stream();
    }

    public function pesanan_lunas(){
        $jumlah = PesananLunas::where('status', 2)->count();
        $pesanan_lunas = PesananLunas::where('status', 2)->get();
        // $sementara = PesananLunas::orderBy('status', 2);

        // $total_penghasilan = sum($pesanan_lunas);
        // $sub_total = $pesanan_lunas['harga'];
        // $sub_total = $pesanan_lunas['total_harga'];
        // $sub_total = $sementara->total_harga;
        // $total_penghasilan = DB::select('SELECT total_penghasilan(' . $jumlah . ',' . $sub_total . ') AS total_penghasilan')[0]->total_penghasilan;
        return view('data-admin.data-recap.pesanan', compact('pesanan_lunas'));
    }

    public function cek_laporan(Request $request){
        if(Gate::allows('admin')){
            $cari = PesananLunas::where('status', 2)->where('updated_at', $request->tanggal)->get();
            $pesanan_lunas = PesananLunas::where('status', 2)->get();

            $tanggal = $request->tanggal;
            
            return view('data-admin.data-recap.pesanan', compact('cari', 'pesanan_lunas', 'tanggal'));
       }else{
            return abort(403, 'Anda Tidak Memiliki Hak Akses!');
       }

    }

    public function cetakPesanan(Request $request){
        $cari = PesananLunas::where('status', 2)->where('updated_at', $request->tanggal)->get();
        $pesanan_lunas = PesananLunas::where('status', 2)->get();

        $pdf = PDF::loadView('data-admin.data-recap.pesanan_pdf', compact('cari', 'pesanan_lunas'))->setPaper('a4', 'potrait');
        return $pdf->stream();
    }

    public function transaksi_lunas(){
        $jumlah = TransaksiLunas::where('status', 1)->count();
        $transaksi_lunas = TransaksiLunas::where('status', 1)->get();
        // $sementara = PesananLunas::orderBy('status', 2);

        // $total_penghasilan = sum($pesanan_lunas);
        // $sub_total = $pesanan_lunas['harga'];
        // $sub_total = $pesanan_lunas['total_harga'];
        // $sub_total = $sementara->total_harga;
        // $total_penghasilan = DB::select('SELECT total_penghasilan(' . $jumlah . ',' . $sub_total . ') AS total_penghasilan')[0]->total_penghasilan;
        return view('data-admin.data-recap.transaksi', compact('transaksi_lunas'));
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
