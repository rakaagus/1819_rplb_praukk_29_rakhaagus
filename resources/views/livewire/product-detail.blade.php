<div class="container">
    {{-- The best athlete wants his opponent at his best. --}}
        <div class="row mb-2">
            <div class="col">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                    <li class="breadcrumb-item text-dark"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item text-dark"><a href="{{ route('products') }}">List Menu</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Detail Menu</li>
                    </ol>
                </nav>
            </div>
        </div>

        {{-- Flash message --}}
        <div class="row">
            <div class="col-md-12">
                @if(session()->has('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
                @endif
            </div>
        </div>
        {{-- End Flash message --}}

        {{-- Detail --}}
        <div class="row">
            <div class="col-md-6">
                <div class="card gambar-product">
                    <div class="card-body">
                        <img src="{{ url('assets/img/product/'.$product->gambar) }}" alt="" class="img-fluid">
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="row">
                    <div class="col">
                        <h2>
                            <strong>{{ $product->nama }}</strong>
                        </h2>
                    </div>
                    <div class="row">
                        <div class="col">
                            {{-- mengecheck apakah field is_ready ada arau tidak --}}
                            @if ($product->is_ready == 1)
                                {{-- jika ada tampilkan dengan span berikut --}}
                                <span class="badge badge-success"><i class="fas fa-check"></i> Menu Tersedia</span>
                                @else
                                {{-- jika tidak ada tampilkan dengan span berikut --}}
                                <span class="badge badge-danger"><i class="fas fa-times"></i> Menu Tidak Tersedia</span>
                            @endif
                        </div>
                    </div>
                </div>

                <h4>Rp. {{ number_format($product->harga) }}</h4>
                <hr>

                {{-- table --}}
                <div class="row">
                    <div class="col">
                        <form wire:submit.prevent="masukkanKeranjang">
                        <table class="table" style="border-top: hidden">
                            <tr>
                                <td>Category</td>
                                <td>:</td>
                                <td>
                                    <H4>{{ $product->category->nama }}</H4>
                                </td>
                            </tr>

                            <tr>
                                <td>Jenis</td>
                                <td>:</td>
                                <td>
                                    {{ $product->jenis }}
                                </td>
                            </tr>


                            <tr>
                                <td>Jumlah</td>
                                <td>:</td>
                                <td>
                                    <input id="jumlah_pesanan" type="number" class="form-control @error('jumlah_pesanan') is-invalid @enderror" wire:model="jumlah_pesanan" value="{{ old('jumlah_pesanan') }}" required autocomplete="jumlah_pesanan">

                                    @error('jumlah_pesanan')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </td>
                            </tr>

                            <tr>
                                <td>Keterangan</td>
                                <td>:</td>
                                <td>
                                    <textarea wire:model="keterangan" class="form-control @error('keterangan') is-invalid @enderror"></textarea>

                                    @error('keterangan')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </td>
                            </tr>

                            <tr>
                                <td colspan="3">
                                    <button type="submit" class="btn btn-dark btn-block" @if($product->is_ready !== 1) disabled @endif><i class="fas fa-shopping-cart mr-2"></i>  Pesan Menu</button>
                                </td>
                            </tr>

                        </table>
                        </form>
                    </div>
                </div>
                {{-- end table --}}
</div>
