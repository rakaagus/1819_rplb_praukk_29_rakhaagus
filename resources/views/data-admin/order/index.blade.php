@extends('data-admin.layouts.app')

@section('title','Data Order | Pizzify')

@section('content')

<div class="container-fluid mb-5" style="min-height: 82.5vh;">
    <h3 class=" py-3"><i class="fas fa-shopping-cart mr-2 pt-4 pb-2" style="size: 2px"></i>Order</h3>

    <div class="card">
        <div class="card-header bg-white">
            <div class="row">
                <div class="col">
                    <span style="font-size: 18px;">Data order</span>
                </div>
                <div class="col text-right">
                    <a href="tambah-inventaris" class="btn btn-primary">Laporan</a>
                </div>
            </div>
        </div>
        <div class=" card-body">
            <table class="table table-bordered table-striped" id="datatables" style="width: 100%;">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama Pesanan</th>
                        <th>Quantity</th>
                        <th>NO Meja</th>
                        <th>Total</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Pizza dulax</td>
                        <td>2</td>
                        <td>5</td>
                        <td>Rp. 200.000,-</td>
                        <td>
                            <a href="" class="btn btn-warning"><i class="fas fa-edit text-white"></i></a>
                            <a href="" class="btn btn-danger"><i class="fas fa-trash text-white"></i></a>
                        </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Pizza Mini beef</td>
                        <td>3</td>
                        <td>3</td>
                        <td>Rp. 140.000,-</td>
                        <td>
                            <a href="" class="btn btn-warning"><i class="fas fa-edit text-white"></i></a>
                            <a href="" class="btn btn-danger"><i class="fas fa-trash text-white"></i></a>
                        </td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>lasanya</td>
                        <td>1</td>
                        <td>2</td>
                        <td>Rp. 25.000,-</td>
                        <td>
                            <a href="" class="btn btn-warning"><i class="fas fa-edit text-white"></i></a>
                            <a href="" class="btn btn-danger"><i class="fas fa-trash text-white"></i></a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>


</div>

@endsection