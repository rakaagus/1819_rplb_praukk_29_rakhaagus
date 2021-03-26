<div class="container">
    {{-- Do your work, then step back. --}}

    <div class="row mb-2">
        <div class="col">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                <li class="breadcrumb-item text-dark"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item text-dark">Profile</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4">
            <div class="card" style="width: 18rem;">
                <img src="{{ url('assets/img/profile/unknows.png') }}" class="card-img-top" alt="...">
                <div class="card-body justify-content-center">
                  <h5 class="card-title">{{ Auth::user()->name }}</h5>
                  <hr>
                  <span>Alamat: </span>
                  <p class="card-text">{{ Auth::user()->alamat }}</p>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-3">
                            Detail
                        </div>
                        <div class="col-md-3 ml-auto">
                            @if ($jumlah_count == 2)
                                <p style="color: blue"><i class="fas fa-crown text-info"></i> Master</p>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <h5 class="card-title">Email : {{ Auth::user()->email }}</h5>
                    <p class="card-text">Nomor Telpon : {{ Auth::user()->nohp }}</p>
                    <p class="card-text">Status : {{ Auth::user()->status }}</p>
                    <hr><br>
                    <div class="card-tittle">
                        <H4>Daftar Pesanan Yang Sudah Dibayar</H4>
                    </div>
                    <div class="tabel-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nomor Meja</th>
                                    <th>Kode Pemesanan</th>
                                    <th>Kode_unik</th>
                                    <th>Total Harga</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pesanan as $psn)
                                <tr>
                                    <td scope="row">{{ $loop->iteration }}</td>
                                    <td>{{ $psn->nomeja }}</td>
                                    <td>{{ $psn->kode_pemesanan }}</td>
                                    <td>{{ $psn->kode_unik }}</td>
                                    <td>{{ $psn->total_harga }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="row">
                        <div class="col">
                            {{ $pagination->links() }}
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>
        
        
</div>
