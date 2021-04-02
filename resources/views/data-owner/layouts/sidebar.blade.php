{{-- sidebar --}}
<div class="vertical-nav" id="sidebar">
    <div class="py-2 px-3">
        <div class="media d-flex align-items-center">
            {{-- <img src="/assets/img/logo.png" alt="" width="40" height="30"> --}}
            <div class="media-body">
                <h5 class="m-0 text-white"><img src="{{ url('assets/img/icon/icon.png') }}" alt="" width="15%"> Pizzify Dashboard</h5>
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
        <label for="" class="text-white ml-2" style="font-size: 15px"><i class="fas fa-project-diagram fa-fw"></i> Data Master</label>
        @if (Auth::user()->level_id == 1)
        <li class="nav-item">
            <div class="px-2 pb-1">
                <a href="{{ route('dashboard-user') }}" class="nav-link text-white rounded">
                    <i class="fas fa-users fa-fw mr-3"></i>User
                </a>
            </div>
        </li>
        @endif
        {{-- end user-link --}}


        {{-- order-link --}}
        <li class="nav-item">
            <div class="px-2 pb-1">
                <a href="{{ route('dashboard-pesanan') }}" class="nav-link text-white rounded">
                    <i class="fas fa-concierge-bell fa-fw mr-3"></i>Pesanan
                </a>
            </div>
        </li>
        {{-- end order-link --}}


        {{-- kasir-link --}}
        <li class="nav-item">
            <div class="px-2 pb-1">
                <a href="{{ route('dashboard-transaksi') }}" class="nav-link text-white rounded">
                    <i class="fas fa-money-check-alt fa-fw mr-3"></i>Transaksi
                </a>
            </div>
        </li>
        {{-- end kasir-link --}}


        {{-- menu-link --}}
        <li class="nav-item">
            <div class="px-2 pb-1">
                <a href="{{ route('dashboard-product') }}" class="nav-link text-white rounded">
                    <i class="fas fa-cookie fa-fw mr-3"></i>Product
                </a>
            </div>
        </li>
        {{-- end menu-link --}}


        {{-- order-link --}}
        @if (Auth::user()->level_id == 1)
        <li class="nav-item">
            <div class="px-2 pb-1">
                <a href="{{ route('category') }}" class="nav-link text-white rounded">
                    <i class="fas fa-th-list fa-fw mr-3"></i>Category
                </a>
            </div>
        </li>
        @endif
        <br>
        {{-- end order-link --}}

        {{-- recap-link --}}
        {{-- hasil-penjualan-link --}}
        <li class="nav-item">
            <div class="px-2 pb-1">
                <label for="" class="text-white ml-2" style="font-size: 15px"><i class="fas fa-project-diagram fa-fw"></i> Rekap</label>
                <a href="{{ route('recap-pesanan') }}" class="nav-link text-white rounded">
                    <i class="far fa-circle mr-3 text-white fa-fw"></i>Pesanan
                </a>
            </div>
        </li>
        {{-- end hasil-penjualan-link --}}

        {{-- hasil-penjualan-link --}}
        <li class="nav-item">
            <div class="px-2 pb-1">
                <a href="{{ route('recap-transaksi') }}" class="nav-link text-white rounded">
                    <i class="far fa-circle mr-3 text-white fa-fw"></i>Transaksi
                </a>
            </div>
        </li>
        {{-- end hasil-penjualan-link --}}
        @if (Auth::user()->level_id == 1)
        {{-- log-link --}}
        <li class="nav-item">
            <div class="px-2 pb-1">
                <a href="{{ route('log') }}" class="nav-link text-white rounded">
                    <i class="fas fa-clock mr-3 text-white fa-fw"></i>Log
                </a>
            </div>
        </li>
        {{-- end log-link --}}
        @endif
        {{-- end recap-link --}}




    </ul>
</div>
{{-- end sidebar --}}
