@extends('data-admin.layouts.app')

@section('title','Data Pesanan | Pizzify')

@section('content')

<div class="container-fluid mb-5" style="min-height: 82.5vh;">
    <h3 class=" py-3"><i class="fas fa-cookie mr-2 pt-4 pb-2" style="size: 2px"></i>Pesanan</h3>

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
                            <th>Nomor Meja</th>
                            <th>Kode Pemesanan</th>
                            <th>Total Harga</th>
                            <th>Sampai</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no=1; ?>
                       @foreach ($pesanans as $psn)
                           <tr>
                               <td>{{ $no++ }}</td>
                               <td>{{ $psn->user->name }}</td>
                               <td>{{ $psn->nomeja}}</td>
                               <td>{{ $psn->kode_pemesanan }}</td>
                               <td>{{ $psn->total_harga }}</td>
                               <?php $pesanan_details = \App\PesananDetail::where('pesanan_id', $psn->id)->count(); ?>
                               <td>{{ $status }} / {{ $pesanan_details }}</td>
                               <td>
                                   <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#edit">
                                        Tambah Data Excel
                                    </button>
                                </td>
                           </tr>
                       @endforeach 
                    </tbody>
                </table>

            </div>
        </div>
    </div>

    {{-- edit Modal --}}
  <div class="modal fade" id="edit" tabindex="-1" aria-labelledby="createModal" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="" method="post">
            @csrf

            <div class="table-responsive">
                <table class="table table-bordered table-striped text-center" id="datatables" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Product</th>
                            <th>harga</th>
                            <th>Jumlah</th>
                            <th>Sub Total</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no=1;?>
                        <?php $pesanan_details = \App\PesananDetail::where('pesanan_id', $psn->id)->count(); ?>
                        @foreach ($pesanan_details as $psnDetail)
                            <tr>
                                <td>{{ $psnDetail->product->nama }}</td>
                                <td>{{ $psnDetail->product->harga }}</td>
                                <td>{{ $psnDetai->jumlah_pesanan }}</td>
                                <td>{{ $psnDetail->total_harga }}</td>
                                <td>
                                    @if ($psnDetail->status == 0)
                                        <form action="{{route('statusOnchange', $psnDetail->id)}}" method="post">
                                            @csrf
                                            {{-- <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#edit">Edit</button> --}}
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" name="status" type="checkbox" id="inlineCheckbox1" value="1">
                                                <label class="form-check-label" for="inlineCheckbox1">Sampai</label>
                                              </div>
                                            {{-- <select class="form-control" name="status" onchange="javascript:this.form.submit()">
                                                <option>--- Status ---</option>
                                                <option value="0" @if($psnDetail->status == 0) selected @endif>Proses</option>
                                                <option value="1" @if($psnDetail->status == 1) selected @endif>Sampai</option>
                                            </select> --}}
                                        </form>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>

              {{-- Footer modal --}}
              <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Save</button>
              </div>
          </form>
        </div>
      </div>
    </div>
  </div>


</div>


@endsection
