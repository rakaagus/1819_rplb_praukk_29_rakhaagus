@extends('data-admin.layouts.app')

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
                  <li class="breadcrumb-item active" aria-current="page">Master</li>
                  <li class="breadcrumb-item active" aria-current="page">User</li>
                </ol>
            </nav>
        </div>
      </div>
    

    <div class="card">
        <div class="card-header bg-white">
            <div class="row">
                <div class="col">
                    <span style="font-size: 18px;">Data Users</span>
                </div>
                <div class="col text-right">
                    <a href="{{ route('dashboard-user.create') }}" class="btn btn-primary">Tambah Data</a>
                </div>
            </div>
        </div>
        <div class=" card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped" id="datatables" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama User</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1 ?>
                        @foreach ($users as $user)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                @if ($user->level->nama_level == "Admin")
                                    <span class="badge badge-danger">{{$user->level->nama_level}}</span>
                                @endif
                                @if ($user->level->nama_level == "Kasir")
                                    <span class="badge badge-primary">{{$user->level->nama_level}}</span>
                                @endif
                                @if ($user->level->nama_level == "Waiter")
                                    <span class="badge badge-warning">{{$user->level->nama_level}}</span>
                                @endif
                                @if ($user->level->nama_level == "Owners")
                                    <span class="badge badge-info">{{$user->level->nama_level}}</span>
                                @endif
                                @if ($user->level->nama_level == "Pelanggan")
                                    <span class="badge badge-success">{{$user->level->nama_level}}</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('dashboard-user.edit', $user->id) }}" class="btn btn-warning btn-md"><i class="fas fa-edit text-white d-inline"></i></a> |
                                <a href="{{ route('dashboard-user.delete', $user->id) }}" class="btn btn-danger btn-md" ><i class="fas fa-trash text-white"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<div>

@endsection
