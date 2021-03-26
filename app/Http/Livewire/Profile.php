<?php

namespace App\Http\Livewire;

use App\Pesanan;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Livewire\WithPagination;

class Profile extends Component
{
    public function render()
    {
        return view('livewire.profile', [
            'jumlah_count' => Pesanan::where('user_id', Auth::user()->id)->where('status', 2)->count(),
            'pesanan' => Pesanan::where('status', 2)->where('user_id', Auth::user()->id)->get(),
            'pagination' => Pesanan::where('user_id', Auth::user()->id)->where('status', 2)->paginate(8)
        ]);
    }
}
