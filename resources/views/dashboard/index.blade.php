@include('../layouts.header')
@include('../layouts.navbar')
@include('../layouts.sidebar')

{{-- Content --}}
<div class="col-md-10 p-5 pt-3">
    <h3><i class="fas fa-tachometer-alt mr-3"></i>Dashboard</h3>

    <div class="row text-white pt-3">
        <div class="card bg-info ml-3 shadow" style="width: 18rem;">
            <div class="card-body">
                <div class="card-body-icon">
                    <i class="fas fa-tachometer-alt mr-2"></i>
                </div>
                    <h5 class="card-title">Jumlah Pesanan</h5>
                    <div class="display-4">1.200</div>
                    <a href="#"><p class="card-text text-white">Lihat Detail <i class="fas fa-angle-double-right ml-2"></i></p></a>
            </div>
          </div>

          <div class="card bg-success ml-4 shadow" style="width: 18rem;">
            <div class="card-body">
                <div class="card-body-icon">
                    <i class="fas fa-tachometer-alt mr-2"></i>
                </div>
                    <h5 class="card-title">Jumlah Menu</h5>
                    <div class="display-4">30</div>
                    <a href="#"><p class="card-text text-white">Lihat Detail <i class="fas fa-angle-double-right ml-2"></i></p></a>
            </div>
          </div>

          <div class="card bg-warning ml-4 shadow" style="width: 18rem;">
            <div class="card-body">
                <div class="card-body-icon">
                    <i class="fas fa-tachometer-alt mr-2"></i>
                </div>
                    <h5 class="card-title">Jumlah Order</h5>
                    <div class="display-4">1.200</div>
                    <a href="#"><p class="card-text text-white">Lihat Detail <i class="fas fa-angle-double-right ml-2"></i></p></a>
            </div>
          </div>
    </div>

    <div class="row mt-4">
      <div class="card ml-3 text-white text-center" style="width: 18rem;">
        <div class="card-header bg-danger display-4 pt-4 pb-4">
          <i class="fab fa-instagram"></i>
        </div>
        <div class="card-body">
          <h5 class="card-title text-danger">Instagram</h5>
          <a href="#" class="btn btn-danger">Follow</a>
        </div>
      </div>

      <div class="card ml-4 text-white text-center" style="width: 18rem;">
        <div class="card-header bg-info display-4 pt-4 pb-4">
          <i class="fab fa-facebook-f"></i>
        </div>
        <div class="card-body">
          <h5 class="card-title text-info">Facebook</h5>
          <a href="#" class="btn btn-info">Like</a>
        </div>
      </div>

      <div class="card ml-4 text-white text-center" style="width: 18rem;">
        <div class="card-header bg-primary display-4 pt-4 pb-4">
          <i class="fab fa-twitter"></i>
        </div>
        <div class="card-body">
          <h5 class="card-title text-primary">Twiter</h5>
          <a href="#" class="btn btn-primary">Follow</a>
        </div>
      </div>
    </div>
    
</div>
</div>

@include('../layouts.js')