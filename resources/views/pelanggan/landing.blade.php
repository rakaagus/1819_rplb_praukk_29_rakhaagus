@include('../layouts.home')
<!-- Navbar -->
<nav class="navbar navbar-expand-lg">
    <div class="container">
      <a class="navbar navbar-brand navbar-custome" href="#">Pizzify</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav ml-auto">
          <a class="nav-link active nav-landing" href="#">Home <span class="sr-only">(current)</span></a>
          <a class="nav-link nav-landing" href="#">Menu</a>
          <a class="nav-link nav-landing" href="#">Pesanan</a>
          <a class="btn btn-primary tombol" href="#" tabindex="-1" aria-disabled="true">Login</a>
        </div>
      </div>
    </div>
  </nav>
  <!-- End navbar -->

  <!-- Jumbotron -->
  <div class="jumbotron jumbotron-fluid">
    <div class="container">
      <h1 class="display-4">Anda <span>kenyang</span> Rasakan kegimbraannya <br> <span>kami</span> puas bersama kami</h1>
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


  </div>
  <!-- end container -->
@include('../layouts.js')