<div class="container">
    {{-- The whole world belongs to you --}}

    <div class="container mt-2">

        {{-- Breadcrumb --}}
        <div class="row mb-2 mt-4">
            <div class="col">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item text-dark"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item text-dark"><a href="{{ route('keranjang') }}">Keranjang</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Checkout</li>
                    </ol>
                </nav>
            </div>
        </div>
        {{-- Breadcrumb --}}

        <div class="row">
            <div class="col-md-12">
                @if(session()->has('message'))
                <div class="alert alert-danger">
                    {{ session('message') }}
                </div>
                @endif
            </div>
        </div>

        <div class="row">
            <div class="col">
                <a href="{{ route('keranjang') }}" class="btn btn-dark"><i class="fas fa-arrow-left"></i> Kembali</a>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col">
                <h4>Informasi Pembayaran</h4>
                <p>Sudah Yakin Ingin Memesan Semua Menu ini Dengan nominal sebesar : <strong>{{ number_format($total_harga) }}</strong></p>
                <div class="media">
                    <div class="media-body">
                      <h5 class="mt-0">Information</h5>
                        Jika Sudah yakin dengan pesanan ini tolong masukan <strong>nohp, alamat dan nomeja</strong>
                    </div>
                  </div>
                <hr>
            </div>
            <div class="col">
                <h4>Informasi Pembayaran</h4>
                <hr>
                <form wire:submit.prevent="checkout">

                    <div class="form-group">
                        <label for="nohp">No. Hp</label>
                        <input id="nohp" wire:model="nohp" type="text" class="form-control @error('nohp') is-invalid @enderror" value="{{ old('nohp') }}" autocomplete="nohp">

                        @error('nohp')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="nomeja">No. Meja</label>
                        <input id="nomeja" wire:model="nomeja" type="text" class="form-control @error('nomeja') is-invalid @enderror" value="{{ old('nomeja') }}" autocomplete="nomeja">

                        @error('nomeja')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="foem-group">
                        <label for="">Alamat</label>
                        <textarea wire:model="alamat" class="form-control @error('alamat') is-invalid @enderror"></textarea>

                        @error('alamat')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-success btn-block mt-3"><i class="fas fa-arrow-right"></i> Checkout</button>
                </form>
            </div>
        </div>
</div>

</div>
