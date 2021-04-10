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
                  <li class="breadcrumb-item active" aria-current="page">Edit</li>
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
            <form action="{{ route('dashboard-user.update', $user->id) }}" method="post">
                @csrf


                {{-- form-group --}}
                <div class="form-group">
                    <label for="Name">Nama User</label>
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="formGroupExampleInput" value="{{$user->name}}">
                    @error('name')
                        <div id="validationServer03Feedback" class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>

                 {{-- form-group --}}
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="formGroupExampleInput" value="{{ $user->email }}">
                    @error('email')
                        <div id="validationServer03Feedback" class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>

                <!--radio section-->
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Role</label>
                    <select name="role" class="form-control" id="exampleFormControlSelect1">
                    <option value="Admin" @if($user->role == 'Admin') selected @endif>admin</option>
                    <option value="Waiter" @if($user->role == 'Waiter') selected @endif>Waiter</option>
                    <option value="Kasir" @if($user->role == 'Kasir') selected @endif>Ksir</option>
                    <option value="Owner" @if($user->role == 'Owner') selected @endif>Owner</option>
                    <option value="Pelanggan" @if($user->role == 'Pelanggan') selected @endif>Pelanggan</option>
                    </select>
                </div><hr>
                <!--End radio Section-->

                  {{-- form-group --}}
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="formGroupExampleInput">
                    <label for="password" style="color: #a8a4a4">Ketik Jika ingin mengubah Password</label>
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
