<?php

namespace App\Http\Livewire;

use App\Pesanan;
use App\PesananDetail;
use App\Product;
use App\Transaction;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ProductDetail extends Component
{
    public $product, $jumlah_pesanan, $keterangan;

    public function mount($id){
        $productDetail = Product::find($id);

        if($productDetail){
            $this->product = $productDetail;
        }
    }

    public function masukkanKeranjang(){
        $this->validate([
            'jumlah_pesanan' => 'required|numeric'
        ]);

        //validasi jika user belum login kembalikan ke login
        if(!Auth::user()){
            return redirect()->route('login');
        }

        //menghitung jumlah Pesanan
        $total_harga = $this->jumlah_pesanan*$this->product->harga;

        //mengecheck apakah user memiliki pesanan utama yang statusnya 0
        $pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status', 0)->first();

        //menyimpan / updaye pesaan utama
        if(empty($pesanan)){
            Pesanan::create([
                'user_id' => Auth::user()->id,
                'total_harga' => $total_harga,
                'status' => 0,
                'nomeja' => 0,
                'kode_unik' => mt_rand(100, 999),
            ]);

            $pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status', 0)->first();
            $pesanan->kode_pemesanan = 'PF-'.$pesanan->id;
            $pesanan->update();
        }else {
            $pesanan->total_harga = $pesanan->total_harga+$total_harga;
            $pesanan->update();
        }

        //menyimpan pesanan Detail
        PesananDetail::create([
            'product_id' => $this->product->id,
            'pesanan_id' => $pesanan->id,
            'jumlah_pesanan' =>$this->jumlah_pesanan,
            'status_keterangan' => $this->keterangan ? true : false,
            'keterangan' => $this->keterangan,
            'status' => 0,
            'total_harga' => $total_harga
        ]);


        $this->emit('masukKeranjang');

        session()->flash('message', 'Pesanan Sukses Masuk Keranjang');

        return redirect()->back();
    }

    public function render()
    {
        return view('livewire.product-detail');
    }
}
