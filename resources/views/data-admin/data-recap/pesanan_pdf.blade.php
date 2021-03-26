<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{public_path('css/app.css')}}">
    <title>Laporan Pesanan Lunas</title>
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
    <h1 class="text-center">Data Per Tanggal : {{Carbon\Carbon::now()}}</h1>
        <table class="styled-table" width="100%">
            <thead>
                <tr class="text-center">
                    <th>No</th>
                    <th>Nama Pemesan</th>
                    <th>Kode Pesanan</th>
                    <th>Kode Unik</th>
                    <th>No Meja</th>
                    <th>Total Harga</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @if (!isset($_POST['cari']))
                    <tbody {{ !isset($_POST['cari']) ? 'd-none' : '' }}>
                        @foreach ($pesanan_lunas as $lunas)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $lunas->user->name }}</td>
                                <td>{{ $lunas->kode_pemesanan }}</td>
                                <td>{{ $lunas->kode_unik }}</td>
                                <td>{{ $lunas->nomeja }}</td>
                                <td>Rp. {{ number_format($lunas->total_harga) }}</td>
                                <td><span class="badge badge-success">Beres</span></td>
                            </tr>
                        @endforeach
                        <tr>
                            <td colspan="7" align="right"><strong> Rp. {{ number_format($pesanan_lunas->sum('total_harga')) }}</strong></td>
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
                                <td>Rp. {{ number_format($lunas->total_harga) }}</td>
                                <td><span class="badge badge-success">Beres</span></td>
                            </tr>
                        @endforeach
                        <tr {{ !isset($_POST['cari']) ? 'd-none' : '' }}>
                            <td colspan="7" align="right"><strong> Rp. {{ number_format($cari->sum('total_harga')) }}</strong></td>
                        </tr>
                        @endisset
                    </tbody>
            </tbody>
        </table>
</body>
</html>