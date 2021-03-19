<div class="container mt-2">

        {{-- Breadcrumb --}}
        <div class="row mb-2 mt-4">
            <div class="col">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item text-dark"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Keranjang</li>
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
                <div class="tabel-responsive">
                    <table class="table text-center table-striped table-bordered">
                        <thead class="thead-dark">
                            <tr>
                                <td>No</td>
                                <td>Gambar</td>
                                <td>Nama Menu</td>
                                <td>Keterangan</td>
                                <td>Jumlah</td>
                                <td>Harga</td>
                                <td><strong>Total Harga</strong></td>
                                <td></td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1?>
                           @forelse ($pesanan_details as $pesanan_detail)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>
                                    <img src="{{ url('assets/img/product/'.$pesanan_detail->product->gambar) }}" alt="" class="img-fluid gambar-product" width="100">
                                </td>
                                <td>{{ $pesanan_detail->product->nama }}</td>
                                <td>
                                    @if($pesanan_detail->status_keterangan)
                                        Keterangan : {{ $pesanan_detail->keterangan }}
                                    @else
                                        -
                                    @endif
                                </td>
                                <td>{{ $pesanan_detail->jumlah_pesanan }}</td>
                                <td>Rp. {{ number_format($pesanan_detail->product->harga) }}</td>
                                <td><strong>Rp. {{ number_format($pesanan_detail->total_harga) }}</strong></td>
                                <td>
                                    <i wire:click="destroy({{ $pesanan_detail->id }})" class="fas fa-times text-danger"></i>
                                </td>
                            </tr>
                           @empty
                            <tr>
                                <td colspan="8">Anda Belum Memesan Menu Apapun. <a href="{{ route('products') }}" style="text-decoration: none;color:black;"><strong>Klik Disini Untuk Melihat Menu</strong></a></td>
                            </tr>
                           @endforelse

                           @if(!empty($pesanan))
                           <tr>
                               <td colspan="6" align="right"><strong>Total Harga:</strong></td>
                               <td align="right">Rp. {{ number_format($pesanan->total_harga) }}
                                <td></td>
                           </tr>
                           <tr>
                               <td colspan="6" align="right"><strong>Kode Unik:</strong></td>
                               <td align="right">Rp. {{ number_format($pesanan->kode_unik) }}</td>
                               <td></td>
                           </tr>
                           <tr>
                               <td colspan="6" align="right"><strong>Total Harga:</strong></td>
                               <td align="right">Rp. {{ number_format($pesanan->total_harga+$pesanan->kode_unik) }}</td>
                               <td></td>
                           </tr>
                           <tr>
                               <td colspan="6"></td>
                               <td colspan="2">
                                   <a href="{{ route('checkout') }}" class="btn btn-success btn-block">
                                        <i class="fas fa-arrow-right"></i> Checkout
                                   </a>
                                </td>
                           </tr>
                           @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
</div>
