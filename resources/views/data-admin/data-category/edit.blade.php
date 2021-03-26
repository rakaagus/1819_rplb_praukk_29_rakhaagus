@extends('data-admin.layouts.app')

@section('title','Data Role | Pizzify')

@section('content')

<div class="container mb-5" style="min-height: 82.5vh;">
    <div class="row">
        <div class="col-md-3">
          <h3 class=" py-3"><i class="fas fa-th-list mr-2 pt-4 pb-2" style="size: 2px"></i>Category</h3>
        </div>
        <div class="col-md-3 ml-auto pt-4">
            <nav aria-label="breadcrumb" style="color: white">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                  <li class="breadcrumb-item"><a href="{{ route('category') }}">Category</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Edit</li>
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
            </div>
        </div>
        <div class=" card-body">
            <form action="{{ route('category.update', $category->id) }}" method="post">
                @csrf

                  {{-- form-group --}}
                  <div class="form-group">
                    <label for="Nama">Nama Category</label>
                    <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" id="formGroupExampleInput" value="{{ $category->nama }}">
                    @error('nama')
                        <div id="validationServer03Feedback" class="invalid-feedback">{{$message}}</div>
                    @enderror
                  </div>

                  {{-- Footer modal --}}
                    <button type="submit" class="btn btn-primary">Save As Change</button>
                  </div>
              </form>
        </div>
    </div>


</div>
@include('sweetalert::alert')
@endsection
