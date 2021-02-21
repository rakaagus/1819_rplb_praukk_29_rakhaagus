<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="assets/fontawesome-free/css/all.min.css">

    <!-- Datatables -->
    <link rel="stylesheet" href="/assets/datatables/datatables.min.css">

    <!-- My css -->
    <link rel="stylesheet" href="/assets/css/admin.css">

    <title>@yield('title')</title>
</head>

<body>

    <!-- Side Bar -->
    @include('admin.layouts.sidebar')
    <!-- Akhir Side Bar -->

    <!-- Body -->
    <div class="page-content p-0" id="content">

        <!-- Navbar -->
        @include('admin.layouts.navbar')
        <!-- Akhir Navbar -->

        <!-- Konten -->
        @yield('content')
        <!-- Akhir Konten -->

        <!-- Footer -->
        {{-- <div class="bg-white p-3 m-0">
            <span class="font-weight-bold text-secondary">Copyright &copy; 2021</span>
            <span class="text-secondary">- Electric Payment</span>
        </div> --}}
        <!-- Akhir Footer -->

    </div>
    <!-- Akhir Body-->




    <!-- JQUERY -->
    {{-- <script src="/assets/jquery/jquery-3.5.1.js"></script> --}}
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script> -->
    <!-- End Jquery

    <!-- Bootstrap & Popper -->

    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script> -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script> -->
    <!-- End Bootstrap & Popper

    <!-- Toggle Sidebar -->
    <script>
        $(function() {
            $('#sidebarCollapse').on('click', function() {
                $('#sidebar, #content').toggleClass('active');
            });
        });
    </script>
    <!-- End Toggle Sidebar -->

    <!-- Datatables -->
    <script src="/assets/datatables/datatables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#datatables').DataTable({
                "scrollX": true
            });
        });
    </script>
    <!-- End Datatables -->

</body>

</html>