@extends('../layouts/app')

@section('title','Data Pesanan | Pizzify')

@section('content')

<div class="container-fluid mb-5" style="min-height: 82.5vh;">
    <div class="row">
        <div class="col-md-3">
            <h3 class=" py-3"><i class="fas fa-concierge-bell mr-2 pt-4 pb-2" style="size: 2px"></i>Pesanan</h3>
        </div>
        <div class="col-md-3 ml-auto pt-4">
            <nav aria-label="breadcrumb" style="color: white">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Master</li>
                  <li class="breadcrumb-item active" aria-current="page">Pesanan</li>
                </ol>
            </nav>
        </div>
      </div>

    <div class="card shadow">
        <div class="card-header bg-white">
            <div class="row">
                <div class="col">
                    <span style="font-size: 18px;">Data Pesanan</span>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped text-center" id="datatables" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Pemesan</th>
                            <th>Status</th>
                            <th>Nama Makanan</th>
                            <th>Jumlah Pesanan</th>
                            <th>Harga</th>
                            <th>Sub Harga</th>
                            @if (Auth::user()->level_id == 4)
                            @else
                            <th>Aksi</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no=1; ?>
                        @foreach ($pesanans as $psn)
                        <tr>
                            <td colspan="9" ><strong> Nomor Meja : {{ $psn->nomeja }} </strong></td>
                        </tr>
                        <?php $pesanan_details = \App\PesananDetail::where('pesanan_id', $psn->id)->get(); ?>
                        @foreach ($pesanan_details as $psnDetail)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{ $psnDetail->pesanan->user->name }}</td>
                            
                            <td>
                                @if ( $psnDetail->status == 0)
                                    <p class="text-danger">Dalam Proses</p>
                                @endif
                                @if( $psnDetail->status == 1)
                                    <p class="text-success">Pesanan Telah Sampai</p>
                                @endif
                            </td>
                           
                            <td>{{ $psnDetail->product->nama }}</td>
                            <td>{{ $psnDetail->jumlah_pesanan }}</td>
                            <td>{{ $psnDetail->product->harga }}</td>
                            <td>{{ $psnDetail->total_harga }}</td>
                            @if (Auth::user()->level_id == 4)
                            @else
                            <td>  
                                <form action="{{route('statusOnchange', $psnDetail->id)}}" method="post">
                                    @csrf
                                    {{-- <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#edit">Edit</button> --}}
                                    <select class="form-control" name="status" onchange="javascript:this.form.submit()">
                                        <option>--- Status ---</option>
                                        <option value="0" @if($psnDetail->status == 0) selected @endif>Proses</option>
                                        <option value="1" @if($psnDetail->status == 1) selected @endif>Sampai</option>
                                      </select>
                                </form>
                            </td>
                            @endif
                        </tr>
                        @endforeach
                        <tr>
                          <td colspan="9" align="right"><strong>Total Harga : {{ $psn->total_harga }}</strong></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>

</div>
@include('sweetalert::alert')

@endsection
