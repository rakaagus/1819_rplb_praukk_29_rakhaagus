@extends('../layouts/app')

@section('title','Data Product | Pizzify')

@section('content')

<div class="container mb-5" style="min-height: 82.5vh;">
    <div class="row">
        <div class="col-md-3">
            <h3 class=" py-3"><i class="fas fa-cookie mr-2 pt-4 pb-2" style="size: 2px"></i>Product</h3>
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

      <div class="card">
        <div class="card-header bg-white">
            <div class="row">
                <div class="col">
                    <span style="font-size: 18px;">Data Category</span>
                </div>
                <div class="col text-right">
                    @if (Auth::user()->level_id == 4)

                    @else
                        <a href="{{ route('dashboard-product.create') }}" class="btn btn-primary">Tambah Data</a>
                    @endif
                </div>
            </div>
        </div>
        <div class=" card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped" id="datatables" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Gambar</th>
                            <th>Nama</th>
                            <th>Harga</th>
                            <th>Nama Category</th>
                            <th>Status</th>
                            <th>Jenis</th>
                            @if (Auth::user()->level_id == 4)
                            @else
                                <th>Aksi</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>
                                <img src="{{ url('assets/img/product/'.$product->gambar) }}" alt="" class="img-fluid gambar-product" width="80px">
                            </td>
                            <td>{{ $product->nama }}</td>
                            <td>{{ $product->harga }}</td>
                            <td>{{ $product->category->nama }}</td>
                            <td>
                                @if ($product->is_ready = 1)
                                    <span class="badge badge-success"><i class="fas fa-check"></i> Menu Tersedia</span>
                                @else
                                    <span class="badge badge-danger"><i class="fas fa-times"></i> Menu Tidak Tersedia</span>
                                @endif
                            </td>
                            <td>{{ $product->jenis }}</td>
                            @if (Auth::user()->level_id == 4)
                            @else
                            <td>
                                    <a href="{{ route('dashboard-product.show', $product->id) }}" class="btn btn-primary btn-md">Detail</a> |
                                    <a href="{{ route('dashboard-product.edit', $product->id) }}" class="btn btn-warning btn-md"><i class="fas fa-edit text-white d-inline"></i></a> |
                                    <a href="{{ route('dashboard-product.delete', $product->id) }}" class="btn btn-danger btn-md" ><i class="fas fa-trash text-white"></i></a>
                            </td>
                            @endif
                        </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
    @include('sweetalert::alert')

</div>

@endsection
