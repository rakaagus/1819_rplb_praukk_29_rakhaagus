<?php

namespace App\Http\Livewire;

use App\Pesanan;
use App\Transaction;
use App\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Checkout extends Component
{
    public $total_harga, $nohp, $nomeja, $alamat;

    public function mount(){
        if(!Auth::user()){
            return redirect()->route('login');
        }

        $this->nohp = Auth::user()->nohp;

        $this->alamat = Auth::user()->alamat;

        $pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status', 0)->first();

        if(!empty($pesanan)){
            $this->total_harga = $pesanan->total_harga+$pesanan->kode_unik;
        }else {
            return redirect()->route('home');
        }
    }

    public function checkout(){
        $this->validate([
            'nohp' => 'required|numeric',
            'alamat' => 'required',
            'nomeja' => 'required'
        ]);

        //simpan nomor hp dan alamat ke tabel user
        $user = User::where('id', Auth::user()->id)->first();
        $user->nohp = $this->nohp;
        $user->alamat = $this->alamat;
        $user->update();

        //update data pesanan
        $pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status', 0)->first();
        $pesanan->status = 1;
        $pesanan->nomeja = $this->nomeja;
        $pesanan->update();

        //create ke tabel transaksi
        Transaction::create([
            'pesanan_id' => $pesanan->id,
            'user_id' => Auth::user()->id,
            'total_bayar' => $pesanan->total_harga,
            'status' => 0
        ]);

        $this->emit('masukKeranjang');

        session()->flash('message', 'Sukses Checkout');

        return redirect()->route('history');

    }
    public function render()
    {
        return view('livewire.checkout');
    }
}
