@extends('../layouts/app')

@section('title','Data Pesanan | Pizzify')

@section('content')

<div class="container-fluid mb-5" style="min-height: 82.5vh;">
    <h3 class=" py-3"><i class="fas fa-cookie mr-2 pt-4 pb-2" style="size: 2px"></i>Pesanan</h3>

    @if (isset($_POST['bayar']))
    <div class="card mb-3 {{ !isset($_POST['bayar']) ? 'd-none' : '' }} pt-2 shadow">
        <div class="card-header bg-white">
            <div class="row">
                <div class="col">
                    <span style="font-size: 18px;">Detail Pemesan</span>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col">
                    <table>
                        <tr>
                            <th>Nomor Meja</th>
                            <td class="px-3">:</td>
                            <td>{{ $pesanan_id->nomeja }}</td>
                        </tr>
                        <tr>
                            <th>Kode Pemesanan</th>
                            <td class="px-3">:</td>
                            <td>{{ $pesanan_id->kode_pemesanan }}</td>
                        </tr>
                        <tr>
                            <th>Kode Unik Pemesanan</th>
                            <td class="px-3">:</td>
                            <td>{{ $pesanan_id->kode_unik }}</td>
                        </tr>
                        <tr>
                            <th>Pemesan</th>
                            <td class="px-3">:</td>
                            <td>{{ $pesanan_id->user->name }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="card {{ !isset($_POST['bayar']) ? 'd-none' : '' }} mb-3 shadow">
        <div class="card-header bg-white">
            <div class="row">
                <div class="col">
                    <span style="font-size: 18px;">Detail Transaksi</span>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped" id="datatables" style="width: 100%;">
                <thead>
                    <tr style="width: 100%;">
                        <th>No.</th>
                        <th>Gambar</th>
                        <th>Nama Product</th>
                        <th>Keterangan</th>
                        <th>Harga</th>
                        <th>Jumlah Pesanan</th>
                        <th>Sub Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($details as $dtl)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>
                                <img src="{{ url('assets/img/product/'.$dtl->product->gambar) }}" alt="" class="img-fluid gambar-product" width="80px">
                            </td>
                            <td>{{ $dtl->product->nama }}</td>
                            <td>
                                @if ($dtl->keterangan == true)
                                    {{ $dtl->keterangan }}
                                    
                                @else
                                    Tidak Ada Keterangan
                                @endif
                            </td>
                            <td>{{ $dtl->product->harga }}</td>
                            <td>{{ $dtl->jumlah_pesanan }}</td>
                            <td>Rp. {{ number_format($dtl->total_harga) }}</td>
                        </tr>
                    @endforeach
                    <tr>
                        <td colspan="7" align="right"><Strong>Kode Unik : {{ $pesanan_id->kode_unik }}</Strong></td>
                    </tr>
                    <tr>
                        <td colspan="7" align="right"><strong>Sub Total Pesanan : Rp.{{ number_format($transaksi->total_bayar) }}</strong></td>
                    </tr>
                    <tr>
                        <td colspan="7" align="right"><strong>Pajak : Rp.{{ number_format($pajak) }}</strong></td>
                    </tr>
                    <tr>
                        <td colspan="7" align="right"><strong>Dibayar : Rp.{{ number_format($transaksi->jumlah_bayar) }}</strong></td>
                    </tr>
                    <tr>
                        @if ($transaksi->kembalian == 0)
                            <td colspan="7" align="right"><strong>Pesanan Ini Tidak Memiliki Kembalian</strong></td>
                        @else
                            <td colspan="7" align="right"><strong>Kembalian : Rp.{{ number_format($transaksi->kembalian) }}</strong></td>
                        @endif
                    </tr>
                    <tr>
                        <td colspan="7" align="right">
                            <a href="{{ route('bayar.pdf', $transaksi->id) }}" class="btn btn-info" target="_blank">Print</a>
                        </td>
                    </tr>
                    <tfoot></tfoot>
                </table>
            </div>
        </div>
    @endif
@include('sweetalert::alert')

@endsection
