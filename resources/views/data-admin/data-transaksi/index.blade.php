@extends('data-admin.layouts.app')

@section('title','Data Pesanan | Pizzify')

@section('content')

<div class="container mb-5" style="min-height: 82.5vh;">
    <div class="row">
        <div class="col-md-3">
            <h3 class=" py-3"><i class="fas fa-money-check-alt mr-2 pt-4 pb-2" style="size: 2px"></i>Transaksi</h3>
        </div>
        <div class="col-md-3 ml-auto pt-4">
            <nav aria-label="breadcrumb" style="color: white">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Master</li>
                  <li class="breadcrumb-item active" aria-current="page">Transaksi</li>
                </ol>
            </nav>
        </div>
      </div>

    <div class="card shadow mb-3">
        <div class="card-header bg-white">
            <div class="row">
                <div class="col">
                    <span style="font-size: 18px;">Cari Transaksi</span>
                </div>
            </div>
        </div>
        <div class="card-body">
            <form action="{{ route('dashboard-transaksi.check') }}" method="POST">
                @csrf
                <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label">Kode Pemesanan</label>
                    <div class="col-5 pr-0">
                        <input type="text" class="form-control" name="kode" placeholder="Kode Pesanan">
                    </div>
                    <div class="col-1 pl-0">
                        <button class="btn btn-primary" name="cari">Cari</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    @if (isset($_POST['cari']))
    <div class="card mb-3 {{ !isset($_POST['cari']) ? 'd-none' : '' }} pt-2 shadow">
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
                            <td>{{ $pesanan->nomeja }}</td>
                        </tr>
                        <tr>
                            <th>Kode Pemesanan</th>
                            <td class="px-3">:</td>
                            <td>{{ $pesanan->kode_pemesanan }}</td>
                        </tr>
                        <tr>
                            <th>Kode Unik Pemesanan</th>
                            <td class="px-3">:</td>
                            <td>{{ $pesanan->kode_unik }}</td>
                        </tr>
                        <tr>
                            <th>Pemesan</th>
                            <td class="px-3">:</td>
                            <td>{{ $pesanan->user->name }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="card {{ !isset($_POST['cari']) ? 'd-none' : '' }} mb-3 shadow">
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
                   @foreach ($detail_pesanan as $detail)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>
                                <img src="{{ url('assets/img/product/'.$detail->product->gambar) }}" alt="" class="img-fluid gambar-product" width="80px">
                            </td>
                            <td>{{ $detail->product->nama }}</td>
                            <td>
                                @if ($detail->keterangan == true)
                                    {{ $detail->keterangan }}
                                    
                                @else
                                    Pesanan Ini Tidak Ditambahkah Keterangan
                                @endif
                            </td>
                            <td>{{ $detail->product->harga }}</td>
                            <td>{{ $detail->jumlah_pesanan }}</td>
                            <td>Rp. {{ number_format($detail->total_harga) }}</td>
                        </tr>
                   @endforeach
                        <tr>
                            <td colspan="7" align="right"><Strong>Kode Unik : {{ $pesanan->kode_unik }}</Strong></td>
                        </tr>
                        <tr>
                            <td colspan="7" align="right"><strong>Sub Total Pesanan : Rp.{{ number_format($detail_transaksi->total_bayar) }}</strong></td>
                        </tr>
                        <tr>
                            <td colspan="7" align="right"><strong>Pajak : Rp.{{ number_format($pajak) }}</strong></td>
                        </tr>
                        <tr>
                            <td colspan="7" align="right"><strong>Total Bayar : Rp. {{ number_format($bayar) }}</strong></td>
                        </tr>
                    </tbody>
                    <tfoot></tfoot>
                </table>
            </div>
        </div>

    <div class="card shadow {{ !isset($_POST['cari']) ? 'd-none' : '' }} mb-3">
        <div class="card-header bg-white">
            <div class="row">
                <div class="col">
                    <span style="font-size: 18px;">Bayar</span>
                </div>
            </div>
        </div>
        <div class="card-body">
            <form action="{{ route('bayar.transaksi', $detail_transaksi->id) }}" method="POST">

                @csrf

                <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label">Total : </label>
                    <div class="col-5 pr-0">
                        <input type="text" class="form-control" name="total_harga" readonly value="{{ $bayar }}" id="total">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label">Jumlah : </label>
                    <div class="col-5 pr-0">
                        <input type="number" class="form-control" name="jumlah_bayar" placeholder="Masukan Jumlah Uang" id="bayar">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label">Kembalian : </label>
                    <div class="col-5 pr-0">
                        <input type="text" class="form-control" id="kembalian" readonly>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Bayar</button>
            </form>
        </div>
    </div>

    @endif

</div>
@include('sweetalert::alert')


@endsection
