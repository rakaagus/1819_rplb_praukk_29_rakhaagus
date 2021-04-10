@extends('../layouts/app')

@section('title','Data Log | Pizzify')

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
                  <li class="breadcrumb-item active" aria-current="page">Recap</li>
                  <li class="breadcrumb-item active" aria-current="page">Log</li>
                </ol>
            </nav>
        </div>
      </div>

      <div class="card">
        <div class="card-header bg-white">
            <div class="row">
                <div class="col">
                    <span style="font-size: 18px;">Data Log</span>
                </div>
            </div>
        </div>
        <div class=" card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped" id="datatables" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Log</th>
                            <th>Tabel</th>
                            <th>User</th>
                            <th>Referensi ID</th>
                            <th>New Item</th>
                            <th>OLD item</th>
                            <th>Deskripsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($logs as $log)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>
                                @if ($log->nama_log == "INSERT")
                                    <p class="text-primary">INSERT</p>
                                @elseif($log->nama_log == "REGISTER")
                                    <p class="text-success">REGISTER</p>
                                @elseif($log->nama_log == "UPDATE PROFILE")
                                    <p class="text-success">UPDATE PROFILE</p>
                                @elseif($log->nama_log == "DELETE")
                                    <p class="text-danger">DELETE</p>
                                @elseif($log->nama_log == "UPDATE")
                                    <p class="text-info">UPDATE</p>
                                @elseif($log->nama_log == "LOGIN")
                                    <p class="text-dark">LOGIN</p>
                                @elseif($log->nama_log == "LOGOUT")
                                    <p class="text-dark">LOGOUT</p>
                                @endif
                            </td>
                            <td>{{ $log->tabel }}</td>
                            <td>{{ $log->user_id }}</td>
                            <td>{{ $log->referensi_id }}</td>
                            <td>{{ $log->new_item }}</td>
                            <td>{{ $log->old_item }}</td>
                            <td>{{ $log->deskripsi }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>


</div>

@endsection
