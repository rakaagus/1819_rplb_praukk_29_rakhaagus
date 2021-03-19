@extends('data-admin.layouts.app')

@section('title','Data Menu | Pizzify')

@section('content')

<div class="container-fluid mb-5" style="min-height: 82.5vh;">
    <h3 class=" py-3"><i class="fas fa-cookie mr-2 pt-4 pb-2" style="size: 2px"></i>Product</h3>

    <div class="card">
        <div class="card-header bg-white">
            <div class="row">
                <div class="col">
                    <span style="font-size: 18px;">Tambah Product</span>
                </div>
            </div>
        </div>
        <div class=" card-body">
            <form action="{{ route('dashboard-product.store') }}" method="post" enctype="multipart/form-data">
                @csrf


                {{-- form-group --}}
                <div class="form-group">
                    <label for="Nama Procuduct">Nama Procuduct</label>
                    <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" id="formGroupExampleInput" value="{{ old('nama') }}">
                    @error('nama')
                        <div id="validationServer03Feedback" class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>

                 {{-- form-group --}}
                <div class="form-group">
                    <label for="Harga">Harga</label>
                    <input type="number" name="harga" class="form-control @error('harga') is-invalid @enderror" id="formGroupExampleInput" value="{{ old('harga') }}">
                    @error('harga')
                        <div id="validationServer03Feedback" class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>

                <div class="form-group {{$errors->has('is_ready') ? 'has-error' : ''}}">
                    <label for="Status Menu">Status Product</label>
                    <select name="is_ready" class="form-control" id="exampleFormControlSelect1">
                    <option value="1"{{(old('is_ready') == 1 ) ? ' selected' : ''}}>Menu Tersedia</option>
                    <option value="0"{{(old('is_ready') == 0) ? ' selected' : ''}}>Menu Tidak Tersedia</option>
                    </select>
                  </div><hr>

                  {{-- form-group --}}
                <div class="form-group">
                    <label for="Nama Menu">Jenis Product</label>
                    <input type="text" name="jenis" class="form-control @error('jenis') is-invalid @enderror" id="formGroupExampleInput" value="{{ old('jenis') }}">
                    @error('jenis')
                        <div id="validationServer03Feedback" class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>

                  <div class="form-group">
                    <label for="exampleFormControlSelect1">Category Product:</label>
                    <select name="category_id" class="form-control" id="category">
                    <option disabled value>-Pilih-</option>
                    @foreach ($category as $category)
                        <option value="{{$category->id}}">{{$category->nama}}</option>
                    @endforeach
                    </select>
                  </div><hr>

                {{-- form-group --}}
                <div class="mb-3">
                    <label for="formFile" class="form-label">Gambar</label>
                    <input class="form-control @error('gambar') is-invalid @enderror" name="gambar" type="file" id="formFile" value="{{ old('gambar') }}">
                    @error('gambar')
                        <div id="validationServer03Feedback" class="invalid-feedback">{{$message}}</div>
                    @enderror
                  </div>

                <button type="submit" class="btn btn-primary">Save</button>
              </form>
        </div>
    </div>


</div>
@endsection
