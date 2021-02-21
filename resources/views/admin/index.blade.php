@extends('admin.layouts.app')

@section('title','Dashboard | Pizzify')

@section('content')

<div class="container-fluid" style="min-height: 82.5vh;">
    <h3 class=" py-3">Dashboard</h3>

    <div class="row">
        <div class="col-lg-3 col-6 pb-3 pr-lg-0">
            <div class="box bg-success rounded">
                <div class="row">
                    <div class="col-6 col-lg-5 col-xl-6">
                        <h6 class="pl-3 pt-5 text-white">Profile</h6>
                    </div>
                    <div class="col-6">
                        <i class="fas fa-user-cog icon py-3" style="font-size: 70px;"></i>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <a href="#" class="btn btn-primary box-footer" style="width: 100%;">Lihat Rincian<i class="fas fa-arrow-circle-right pl-1"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-6 pb-3 pr-lg-0">
            <div class="box bg-primary rounded">
                <div class="row">
                    <div class="col-6 col-lg-5 col-xl-6">
                        <h6 class="pl-3 pt-5 text-white">Kelola Pelanggan</h6>
                    </div>
                    <div class="col-6">
                        <i class="fas fa-users icon py-3" style="font-size: 70px;"></i>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <a href="pelanggan" class="btn btn-primary box-footer" style="width: 100%;">Lihat Rincian<i class="fas fa-arrow-circle-right pl-1"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-6 pb-3 pr-lg-0">
            <div class="box bg-danger rounded">
                <div class="row">
                    <div class="col-6 col-lg-5 col-xl-6">
                        <h6 class="pl-3 pt-5 text-white">Kelola Tarif</h6>
                    </div>
                    <div class="col-6">
                        <i class="fas fa-briefcase icon py-3" style="font-size: 70px;"></i>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <a href="tarif" class="btn btn-primary box-footer" style="width: 100%;">Lihat Rincian<i class="fas fa-arrow-circle-right pl-1"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-6 pb-3">
            <div class="box bg-info rounded">
                <div class="row">
                    <div class="col-6 col-lg-5 col-xl-6">
                        <h6 class="pl-3 pt-5 text-white">Kelola Penggunaan</h6>
                    </div>
                    <div class="col-6">
                        <i class="fas fa-tasks icon py-3" style="font-size: 70px;"></i>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <a href="penggunaan" class="btn btn-primary box-footer" style="width: 100%;">Lihat Rincian<i class="fas fa-arrow-circle-right pl-1"></i></a>
                    </div>
                </div>
            </div>
        </div>
        
        
    </div>


</div>

@endsection