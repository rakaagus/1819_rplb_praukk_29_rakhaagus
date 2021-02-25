@extends('data-admin.layouts.app')

@section('title','Dashboard | Pizzify')

@section('content')

<div class="container-fluid" style="min-height: 82.5vh;">
    <h3 class=" py-3">Dashboard</h3>

    {{-- card --}}

    {{-- data-user-card --}}
    <div class="row">
        <div class="col-lg-3 col-6 pb-3 pr-lg-0">
            <div class="box rounded" style="background-color: #19B4C9">
                <div class="row">
                    <div class="col-6 col-lg-5 col-xl-6">
                        <h6 class="pl-3 pt-5 text-white">Data User</h6>
                    </div>
                    <div class="col-6">
                        <i class="fas fa-users icon py-3" style="font-size: 70px;"></i>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <a href="#" class="btn btn-primary box-footer" style="width: 100%;">Lihat Rincian<i class="fas fa-arrow-circle-right pl-1"></i></a>
                    </div>
                </div>
            </div>
        </div>
        {{-- end data-user-card --}}

        {{-- data-menu-card --}}
        <div class="col-lg-3 col-6 pb-3 pr-lg-0">
            <div class="box rounded" style="background-color: #6AD01A">
                <div class="row">
                    <div class="col-6 col-lg-5 col-xl-6">
                        <h6 class="pl-3 pt-5 text-white">Kelola Menu</h6>
                    </div>
                    <div class="col-6">
                        <i class="fas fa-cookie icon py-3" style="font-size: 70px;"></i>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <a href="pelanggan" class="btn btn-primary box-footer" style="width: 100%;">Lihat Rincian<i class="fas fa-arrow-circle-right pl-1"></i></a>
                    </div>
                </div>
            </div>
        </div>
        {{-- end data-menu-card --}}

        {{-- menu-kasir-card --}}
        <div class="col-lg-3 col-6 pb-3 pr-lg-0">
            <div class="box rounded" style="background-color: #EC4953">
                <div class="row">
                    <div class="col-6 col-lg-5 col-xl-6">
                        <h6 class="pl-3 pt-5 text-white">Menu Kasir</h6>
                    </div>
                    <div class="col-6">
                        <i class="fas fa-money-check-alt icon py-3" style="font-size: 70px;"></i>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <a href="tarif" class="btn btn-primary box-footer" style="width: 100%;">Lihat Rincian<i class="fas fa-arrow-circle-right pl-1"></i></a>
                    </div>
                </div>
            </div>
        </div>
        {{-- end menu-kasir-card --}}

        {{-- data-order-card --}}
        <div class="col-lg-3 col-6 pb-3">
            <div class="box bg-primary rounded">
                <div class="row">
                    <div class="col-6 col-lg-5 col-xl-6">
                        <h6 class="pl-3 pt-5 text-white">Data Order</h6>
                    </div>
                    <div class="col-6">
                        <i class="fas fa-concierge-bell icon py-3" style="font-size: 70px;"></i>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <a href="penggunaan" class="btn btn-primary box-footer" style="width: 100%;">Lihat Rincian<i class="fas fa-arrow-circle-right pl-1"></i></a>
                    </div>
                </div>
            </div>
        </div>
        {{-- end data-order-card --}}
        
    </div>
    {{-- end card --}}

</div>

@endsection