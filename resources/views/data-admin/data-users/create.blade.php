@extends('../layouts./app')

@section('title','Data Users | Pizzify')

@section('content')

<div class="container mb-5" style="min-height: 82.5vh;">
    <div class="row">
        <div class="col-md-3">
            <h3 class=" py-3"><i class="fas fa-users mr-2 pt-4 pb-2" style="size: 2px"></i>Users</h3>
        </div>
        <div class="col-md-3 ml-auto pt-4">
            <nav aria-label="breadcrumb" style="color: white">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                  <li class="breadcrumb-item"><a href="{{ route('dashboard-user') }}">User</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Create</li>
                </ol>
            </nav>
        </div>
      </div>

    <div class="card">
        <div class="card-header bg-white">
            <div class="row">
                <div class="col">
                    <span style="font-size: 18px;">Tambah Users</span>
                </div>
            </div>
        </div>
        <div class=" card-body">
            <form action="{{ route('dashboard-user.store') }}" method="post">
                @csrf


                {{-- form-group --}}
                <div class="form-group">
                    <label for="Name">Nama User</label>
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="formGroupExampleInput" value="{{ old('name') }}">
                    @error('name')
                        <div id="validationServer03Feedback" class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>

                 {{-- form-group --}}
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="formGroupExampleInput" value="{{ old('email') }}">
                    @error('email')
                        <div id="validationServer03Feedback" class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>

                <div class="form-group {{$errors->has('role') ? 'has-error' : ''}}">
                    <label for="Status Menu">Status Product</label>
                    <select name="role" class="form-control" id="exampleFormControlSelect1">
                    <option value="Admin"{{(old('role') == 'Admin' ) ? ' selected' : ''}}>Admin</option>
                    <option value="Waiters"{{(old('role') == 'Waiters' ) ? ' selected' : ''}}>Waiters</option>
                    <option value="Kasir"{{(old('role') == 'Kasir' ) ? ' selected' : ''}}>Kasir</option>
                    <option value="Owner"{{(old('role') == 'Owner' ) ? ' selected' : ''}}>Owner</option>
                    <option value="Pelanggan"{{(old('role') == 'Pelanggan') ? ' selected' : ''}}>Pelanggan</option>
                    </select>
                  </div><hr>

                  {{-- form-group --}}
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="formGroupExampleInput" value="{{ old('password') }}">
                    @error('password')
                        <div id="validationServer03Feedback" class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Save</button>
              </form>
        </div>
    </div>
    @include('sweetalert::alert')

</div>
@endsection
