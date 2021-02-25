{{-- sidebar --}}
<div class="vertical-nav" id="sidebar">
    <div class="py-2 px-3">
        <div class="media d-flex align-items-center">
            {{-- <img src="/assets/img/logo.png" alt="" width="40" height="30"> --}}
            <div class="media-body">
                <h5 class="m-0 text-white">Pizzify Dashboard</h5>
            </div>
        </div>
    </div>
    <hr class="bg-white mt-2" width="250">
    <ul class="nav flex-column mb-0" style="background-color: #313535;">


        {{-- dashboard-link --}}
        <li class="nav-item">
            <div class="px-2 pb-1">
                <a href="{{route('dashboard')}}" class="nav-link text-white rounded">
                    <i class="fas fa-tachometer-alt mr-3 text-white fa-fw"></i>Dashboard
                </a>
            </div>
        </li><br>
        {{-- end dashboard-link --}}


        {{-- user-link --}}
        <li class="nav-item">
            <div class="px-2 pb-1">
                <label for="" class="text-white ml-2" style="font-size: 15px"><i class="fas fa-project-diagram fa-fw"></i> Data Master</label>
                <a href="#" class="nav-link text-white rounded">
                    <i class="fas fa-users fa-fw mr-3"></i>User
                </a>
            </div>
        </li>
        {{-- end user-link --}}


        {{-- order-link --}}
        <li class="nav-item">
            <div class="px-2 pb-1">
                <a href="{{route('order')}}" class="nav-link text-white rounded">
                    <i class="fas fa-concierge-bell fa-fw mr-3"></i>Order
                </a>
            </div>
        </li>
        {{-- end order-link --}}


        {{-- kasir-link --}}
        <li class="nav-item">
            <div class="px-2 pb-1">
                <a href="{{route('transaksi')}}" class="nav-link text-white rounded">
                    <i class="fas fa-money-check-alt fa-fw mr-3"></i>Kasir
                </a>
            </div>
        </li>
        {{-- end kasir-link --}}


        {{-- menu-link --}}
        <li class="nav-item">
            <div class="px-2 pb-1">
                <a href="{{route('menu')}}" class="nav-link text-white rounded">
                    <i class="fas fa-cookie fa-fw mr-3"></i>menu
                </a>
            </div>
        </li><br>
        {{-- end menu-link --}}


        {{-- recap-link --}}
        {{-- hasil-penjualan-link --}}
        <li class="nav-item">
            <div class="px-2 pb-1">
                <label for="" class="text-white ml-2" style="font-size: 15px"><i class="fas fa-project-diagram fa-fw"></i> Rekap</label>
                <a href="laporan-pembayaran" class="nav-link text-white rounded">
                    <i class="fas fa-circle-notch mr-3 text-white fa-fw"></i>Hasil Penjualan
                </a>
            </div>
        </li>
        {{-- end hasil-penjualan-link --}}

        {{-- laporan-pembayaran-link --}}
        <li class="nav-item">
            <div class="px-2 pb-1">
                <a href="laporan-pembayaran" class="nav-link text-white rounded">
                    <i class="fas fa-circle-notch mr-3 text-white fa-fw"></i>Laporan Pembayaran
                </a>
            </div>
        </li><br>
        {{-- end laporan-pembayaran-link --}}
        {{-- end recap-link --}}


        {{-- log-link --}}
        <li class="nav-item">
            <div class="px-2 pb-1">
                <a href="laporan-pembayaran" class="nav-link text-white rounded">
                    <i class="fas fa-clock mr-3 text-white fa-fw"></i>Log
                </a>
            </div>
        </li>
        {{-- end log-link --}}


    </ul>
    {{-- {{Route::is('dashboard') ? 'font-weight-bold btn-primary' : ''}} --}}
</div>
{{-- end sidebar --}}