@extends('data-pelanggan.layouts.app')

@section('title','Index | Pizzify')

@section('content')

<!-- Navbar -->
<nav class="navbar navbar-expand-lg">
  <div class="container">
    <a class="navbar-brand" href="#">Pizzify</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav ml-auto">
        <a class="nav-link active" href="#">Home <span class="sr-only">(current)</span></a>
        <a class="nav-link" href="#" tabindex="-1" aria-disabled="true">category</a>
        <a class="nav-link" href="#">Menu</a>
        <a class="nav-link" href="#">Orders</a>
        <a class="btn btn-primary tombol" href="#" tabindex="-1" aria-disabled="true">Login</a>
      </div>
    </div>
  </div>
</nav>
<!-- End navbar -->

    <!-- Jumbotron -->
    <div class="jumbotron jumbotron-fluid">
      <div class="container">
        <h1 class="display-4">Get work done and <span>faster</span><br> and <span>better</span> with us</h1>
        <a href="" class="btn btn-primary tombol">We Are</a>
      </div>
    </div>
    <!-- end Jumbotron -->

    <!-- container -->
    <div class="container">

      <!-- info panel -->
      <div class="row justify-content-center">
        <div class="col-10 info-panel">
          <div class="row">
            <div class="col-lg">
              <img src="assets/img/login.png" alt="Employee" class="float-left">
              <h4>24 Hours</h4>
              <p>Lorem ipsum dolor sit amet.</p>
            </div>
            <div class="col-lg">
              <img src="assets/img/login.png" alt="Employee" class="float-left">
              <h4>24 Hours</h4>
              <p>Lorem ipsum dolor sit amet.</p>
            </div>
            <div class="col-lg">
              <img src="assets/img/login.png" alt="Employee" class="float-left">
              <h4>24 Hours</h4>
              <p>Lorem ipsum dolor sit amet.</p>
            </div>
          </div>
        </div>
      </div>
      <!-- end info panel -->


    {{-- working space --}}
    <div class="row workingspace">
        <div class="col-lg-6">
            <img src="assets/img/login.png" alt="Workingspace" class="img-fluid">
        </div>
        <div class="col-lg-5">
            <h3>You <span>Work</span> Like At <span>Home</span> </h3>
            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Dicta, optio?</p>
            <a href="" class="btn btn-primary tombol">Gallery</a>
        </div>
    </div>
    {{-- end working space --}}


    {{-- Testimoni --}}
    <section class="testimonial">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <h5>" Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus dolore nobis error at! "</h5>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-6 justify-content-center d-flex">
                <figure class="figure">
                    <img src="assets/img/login.png" class="figure-img img-fluid rounded-circle" alt="Testi 1">
                </figure>
                <figure class="figure">
                    <img src="assets/img/login.png" class="figure-img img-fluid rounded-circle utama" alt="Testi 2">
                    <figcaption class="figure-caption">
                        <h5>Udeean</h5>
                        <p>Desainer</p>
                    </figcaption>
                </figure>
                <figure class="figure">
                    <img src="assets/img/login.png" class="figure-img img-fluid rounded-circle" alt="Testi 3">
                </figure>
            </div>
        </div>
    </section>
    {{-- End Testimoni --}}

    {{-- footer --}}
    <div class="row footer">
        <div class="col text-center">
            <p>Aplikasi abal abal 2021</p>
        </div>
    </div>
    {{-- end footer --}}

    </div>
    <!-- end container -->

@endsection
