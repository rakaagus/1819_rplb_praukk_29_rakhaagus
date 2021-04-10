@extends('../layouts/app')

@section('title','Data Product | Pizzify')

@section('content')

<div class="container-fluid mb-5" style="min-height: 82.5vh;">
    <div class="row">
        <div class="col-md-3">
            <h3 class=" py-3"><i class="fas fa-cookie mr-2 pt-4 pb-2" style="size: 2px"></i>Product</h3>
        </div>
        <div class="col-md-3 ml-auto pt-4">
            <nav aria-label="breadcrumb" style="color: white">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                  <li class="breadcrumb-item"><a href="{{ route('dashboard-product') }}">Product</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Show</li>
                </ol>
            </nav>
        </div>
      </div>

    <div class="row">
        <div class="col-md-6">
            <div class="card gambar-product shadow">
                <div class="card-body">
                    <img src="{{ url('assets/img/product/'.$product->gambar) }}" alt="" class="img-fluid">
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card shadow">

                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <h2>
                                <strong>{{ $product->nama }}</strong>
                            </h2>
                        </div>
                        <div class="row">
                            <div class="col">
                                {{-- mengecheck apakah field is_ready ada arau tidak --}}
                                @if ($product->is_ready == 1)
                                    {{-- jika ada tampilkan dengan span berikut --}}
                                    <span class="badge badge-success"><i class="fas fa-check"></i> Menu Tersedia</span>
                                    @else
                                    {{-- jika tidak ada tampilkan dengan span berikut --}}
                                    <span class="badge badge-danger"><i class="fas fa-times"></i> Menu Tidak Tersedia</span>
                                @endif
                            </div>
                        </div>
                    </div>

                    <h4>Rp. {{ number_format($product->harga) }}</h4>
                    <hr>

                    {{-- table --}}
                    <div class="row">
                        <div class="col">
                            <table class="table" style="border-top: hidden">
                                <tr>
                                    <td>Category</td>
                                    <td>:</td>
                                    <td>
                                        <H4>{{ $product->category->nama }}</H4>
                                    </td>
                                </tr>

                                <tr>
                                    <td>Jenis</td>
                                    <td>:</td>
                                    <td>
                                        {{ $product->jenis }}
                                    </td>
                                </tr>

                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection
