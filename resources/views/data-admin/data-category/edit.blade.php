@extends('data-admin.layouts.app')

@section('title','Data Role | Pizzify')

@section('content')

<div class="container-fluid mb-5" style="min-height: 82.5vh;">
    <h3 class=" py-3"><i class="fas fa-th-list mr-2 pt-4 pb-2" style="size: 2px"></i>Category</h3>

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
@endsection
