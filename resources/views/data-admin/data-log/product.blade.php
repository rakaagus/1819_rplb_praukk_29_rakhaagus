@extends('data-admin.layouts.app')

@section('title','Data log | Pizzify')

@section('content')

<div class="container-fluid mb-5" style="min-height: 82.5vh;">
    <h3 class=" py-3"><i class="fas fa-cookie mr-2 pt-4 pb-2" style="size: 2px"></i>Product Logs</h3>

    <div class="card shadow">
        <div class="card-header bg-white">
            <div class="row">
                <div class="col text-right">
                    <a href="{{ route('category-log') }}" class="btn btn-primary btn-md" >Category Logs</a>
                    <a href="{{ route('user-log') }}" class="btn btn-primary btn-md">User Logs</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped" id="datatables" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Id Category</th>
                            <th>Event</th>
                            <th>New Item</th>
                            <th>Old Item</th>
                            <th>Keterangan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        @foreach ($logProduct as $log)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $log->id_category }}</td>
                            <td>{{ $log->event }}</td>
                            <td>{{ $log->new_name }}</td>
                            <td>{{ $log->old_name }}</td>
                            <td>{{ $log->keterangan }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>



  
</div>

@endsection
