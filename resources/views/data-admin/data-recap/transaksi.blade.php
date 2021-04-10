@extends('../layouts/app')

@section('title','Data Recap | Pizzify')

@section('content')

<div class="container-fluid mb-5" style="min-height: 82.5vh;">
    <div class="row">
        <div class="col-md-3">
            <h3 class=" py-3"><i class="fas fa-cookie mr-2 pt-4 pb-2" style="size: 2px"></i>Pesanan</h3>
        </div>
        <div class="col-md-3 ml-auto pt-4">
            <nav aria-label="breadcrumb" style="color: white">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Recap</li>
                  <li class="breadcrumb-item active" aria-current="page">Pesanan</li>
                </ol>
              </nav>
        </div>
    </div>

    <div class="card mb-2">
        <div class="card-header bg-white">
            <div class="row">
                <div class="col">
                    <span style="font-size: 18px;">Cari Berdasarkan</span>
                </div>
            </div>
        </div>
        <div class="card-body">
            <form action="" method="POST">
                @csrf
                <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label">Tanggal</label>
                    <div class="col-4">
                        <select class="custom-select mr-sm-2" name="tanggal">
                            <option value="">Pilih Tanggal</option>
                            @foreach ($transaksi_lunas as $lunas)
                            <option value="{{ $lunas->updated_at }}">{{ $loop->iteration }}.{{ $lunas->updated_at->format('d, M Y') }}</option>
                            @endforeach
                        </select>
                    </div>
                </div><br>
                <div class="form-group row ml-auto">
                    <div class="col-4">
                        <button type="submit" name="cari" class="btn btn-primary">Tampilkan</button>
                        <button type="reset" class="btn btn-danger">Reset</button>
                        <a href="{{ route('recap-transaksi') }}" class="btn btn-info text-white">Refresh</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="card shadow">
        <div class="card-header bg-white">
            <div class="row">
                <div class="col">
                    <span style="font-size: 18px;">Recap Transaksi</span>
                </div>

                @if (isset($_POST['cari']))
                <div class="col text-right">
                    Tanggal : {{ $tanggal }}
                </div>
                @else
                    Data Trasaksi Lunas
                @endif
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped text-center" id="datatables" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Pemesan</th>
                            <th>Kode Pesanan</th>
                            <th>Kode Unik</th>
                            <th>No Meja</th>
                            <th>Total Harga</th>
                            <th>Total Bayar</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    @if (!isset($_POST['cari']))
                    <tbody {{ !isset($_POST['cari']) ? 'd-none' : '' }}>
                        @foreach ($transaksi_lunas as $lunas)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $lunas->user_id}}</td>
                                <td>{{ $lunas->kode_pemesanan }}</td>
                                <td>{{ $lunas->kode_unik }}</td>
                                <td>{{ $lunas->nomeja }}</td>
                                <td>Rp. {{ number_format($lunas->total_bayar) }}</td>
                                <td>Rp. {{ number_format($lunas->jumlah_bayar) }}</td>
                                <td><span class="badge badge-success">Beres</span></td>
                            </tr>
                        @endforeach
                        <tr>
                            <td colspan="8" align="right"><strong> Rp. {{ number_format($transaksi_lunas->sum('total_bayar')) }}</strong></td>
                        </tr>
                    </tbody>
                    @endif

                    @isset ($_POST['cari'])
                    <tbody>
                        @foreach ($cari as $lunas)
                            <tr {{ !isset($_POST['cari']) ? 'd-none' : '' }}>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $lunas->user->name }}</td>
                                <td>{{ $lunas->kode_pemesanan }}</td>
                                <td>{{ $lunas->kode_unik }}</td>
                                <td>{{ $lunas->nomeja }}</td>
                                <td>Rp. {{ number_format($lunas->total_bayar) }}</td>
                                <td>Rp. {{ number_format($lunas->jumlah_bayar) }}</td>
                                <td><span class="badge badge-success">Beres</span></td>
                            </tr>
                        @endforeach
                        <tr {{ !isset($_POST['cari']) ? 'd-none' : '' }}>
                            <td colspan="8" align="right"><strong> Rp. {{ number_format($cari->sum('total_bayar')) }}</strong></td>
                        </tr>
                        @endisset

                        @if (isset($_POST['cari']))
                        <tr {{ !isset($_POST['cari']) ? 'd-none' : '' }}>
                            <td colspan="8" align="right">
                                <form action="" method="POST" target="_blank">
                                    @csrf
                                    <input type="hidden" name="tanggal" value="{{ $tanggal }}">
                                    <button type="submit" name="cari" class="btn btn-warning">Print</button>
                                </form>
                            </td>   
                        </tr>
                        @endif

                        @if (!isset($_POST['cari']))
                        <tr {{ !isset($_POST['cari']) ? 'd-none' : '' }}>
                            <td colspan="8" align="right">
                                <form action="{{ route('cetak-pesanan') }}" method="POST" target="_blank">
                                    @csrf
                                    <button type="submit" class="btn btn-info text-white">Print</button>
                                </form>
                            </td>
                        </tr>
                        @endif
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>
@include('sweetalert::alert')

@endsection
