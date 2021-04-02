<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{public_path('css/app.css')}}">
    <title>Detail Pembayaran</title>
    <style>
        .styled-table {
            border-collapse: collapse;
            margin: 25px 0;
            font-size: 0.9em;
            font-family: sans-serif;
            min-width: 400px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
        }
        .styled-table thead tr {
            background-color:#00FFFF;
            color: #050505;
            width: 4px;
            text-align: left;
        }
        .styled-table th,
        .styled-table td {
            padding: 12px 15px;
        }
        .styled-table tbody tr {
        border-bottom: 1px solid #dddddd;
        }
        .styled-table tbody tr:nth-of-type(even) {
            background-color: #f3f3f3;
        }
        .styled-table tbody tr:last-of-type {
            border-bottom: 2px solid#00FFFF;
        }
        .styled-table tbody tr.active-row {
            font-weight: bold;
            color:#00FFFF;
        }
        .text-center {
            text-align: center !important;
        }
    </style>
</head>
<body class="bg-white">
    <h1 class="text-center">Detail Pembayaran: {{Carbon\Carbon::now()}}</h1>
    <div class="card mb-3 pt-2 shadow">
        <div class="card-header bg-white">
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

    <h1 class="text-center">Detail Pesanan</h1>
    <div class="card mb-3 shadow">
        <div class="card-header bg-white">
            
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
                                <img src="{{public_path('assets/img/product').'/'.$dtl->product->gambar}}" width="100">
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
                    <tfoot></tfoot>
                </table>
            </div>
        </div>
</body>
</html>