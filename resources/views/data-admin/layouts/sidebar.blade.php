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
        <li class="nav-item">
            <div class="px-2 pb-1">
                <a href="{{route('dashboard')}}" class="nav-link text-white rounded">
                    <i class="fas fa-tachometer-alt mr-3 text-white fa-fw"></i>Dashboard
                </a>
            </div>
        </li>
        <li class="nav-item">
            <div class="px-2 pb-1">
                <a href="{{route('order')}}" class="nav-link text-white rounded">
                    <i class="fas fa-concierge-bell fa-fw mr-3"></i>Order
                </a>
            </div>
        </li>
        <li class="nav-item">
            <div class="px-2 pb-1">
                <a href="{{route('transaksi')}}" class="nav-link text-white rounded">
                    <i class="fas fa-money-check-alt fa-fw mr-3"></i>Transaksi
                </a>
            </div>
        </li>
        <li class="nav-item">
            <div class="px-2 pb-1">
                <a href="{{route('menu')}}" class="nav-link text-white rounded">
                    <i class="fas fa-cookie fa-fw mr-3"></i>menu
                </a>
            </div>
        </li><hr>
        <li class="nav-item">
            <div class="px-2 pb-1">
                <a href="laporan-pembayaran" class="nav-link text-white rounded">
                    <i class="fas fa-clipboard mr-3 text-white fa-fw"></i>Hasil Penjualan
                </a>
            </div>
        </li>
        <li class="nav-item">
            <div class="px-2 pb-1">
                <a href="laporan-pembayaran" class="nav-link text-white rounded">
                    <i class="fas fa-wallet mr-3 text-white fa-fw"></i>Laporan Pembayaran
                </a>
            </div>
        </li>
    </ul>
    {{-- {{Route::is('dashboard') ? 'font-weight-bold btn-primary' : ''}} --}}
</div>
{{-- end sidebar --}}