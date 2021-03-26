<div class="container">
    {{-- The whole world belongs to you --}}

    <div class="container mt-2">

        {{-- Breadcrumb --}}
        <div class="row mb-2 mt-4">
            <div class="col">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item text-dark"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">History</li>
                    </ol>
                </nav>
            </div>
        </div>
        {{-- Breadcrumb --}}

        <div class="row">
            <div class="col-md-12">
                @if(session()->has('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
                @endif
            </div>
        </div>


        <div class="row mt-4">
            <div class="col">
                <div class="table-responsive">
                    <table class="table text-center">
                        <thead>
                            <tr>
                                <td>No.</td>
                                <td>Tanggal Pesanan</td>
                                <td>Kode Pesanan</td>
                                <td>Nomor Meja</td>
                                <td>Pesanan</td>
                                <td>Status</td>
                                <td><Strong>Total Harga</Strong></td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1?>
                            @forelse ($pesanans as $pesanan)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $pesanan->created_at}}</td>
                                    <td>{{ $pesanan->kode_pemesanan}}</td>
                                    <td>{{ $pesanan->nomeja}}</td>
                                    <td>
                                        <?php $pesanan_details = \App\PesananDetail::where('pesanan_id', $pesanan->id)->get(); ?>
                                        @foreach ($pesanan_details as $pesanan_detail)
                                            <img src="{{ url('assets/img/product/'.$pesanan_detail->product->gambar) }}" alt="" class="img-fluid gambar-product" width="60">
                                            {{ $pesanan_detail->product->nama }} | {{ $pesanan_detail->product->harga }} X {{$pesanan_detail->jumlah_pesanan}} |  
                                            @if ($pesanan_detail->status == 1)
                                                Pesanan Sampai
                                            @else
                                                Pesanan Diproses
                                            @endif
                                                <br>
                                            @endforeach
                                    </td>
                                    <td>
                                        @if ($pesanan->status == 1)
                                            Pesanan Menunggu proses Pembayaran
                                        @elseif($pesanan->status == 0)
                                            Pesanan Diproses
                                        @elseif($pesanan->status == 2)
                                            Pesanan Beres
                                        @endif
                                    </td>
                                    <td><strong>Rp. {{ number_format($pesanan->total_harga) }}</strong></td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7">Data Kosong</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <div class="card shadow">
                    <div class="card-body">
                        <p>Untuk Pembayaran anda dapat Menuju Meja Kasir, Atau dapat memangil Kasir</p>
                        <div class="media">
                            <div class="media-body">
                            <h5 class="mt-0">Information</h5>
                            Jika Ada Masalah Lampirkan ke <strong>Sini</strong>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>
