<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <link rel="shortcut icon" href="{{ url('assets/img/icon/icon.png') }}">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ url('/assets/fontawesome/css/all.min.css') }}">

    <!-- Datatables -->
    <link rel="stylesheet" href="{{ url('/assets/datatables/DataTables-1.10.24/css/dataTables.bootstrap4.min.css') }}">

    <!-- My css -->
    <link rel="stylesheet" href="{{ url('/assets/css/admin.css') }}">

    <title>@yield('title')</title>
</head>

<body>

    <!-- Side Bar -->
    @include('data-admin.layouts.sidebar')
    <!-- Akhir Side Bar -->

    <!-- Body -->
    <div class="page-content p-0" id="content">

        <!-- Navbar -->
        @include('data-admin.layouts.navbar')
        <!-- Akhir Navbar -->

        <!-- Konten -->
        @yield('content')
        <!-- Akhir Konten -->



    </div>
    <!-- Akhir Body-->




    <!-- JQUERY -->
    {{-- <script src="/assets/jquery/jquery-3.5.1.js"></script> --}}
    <!-- End Jquery

    <!-- Bootstrap & Popper -->

    {{-- <script src="{{ url('/assets/bootstrap/js/bootstrap.min.js') }}"></script> --}}
    {{-- <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>  --}}
    
    <!-- Datatables -->
    <script src="{{ url('/assets/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ url('/assets/datatables/DataTables-1.10.24/js/dataTables.bootstrap4.min.js') }}" defer></script>
    <script src="{{ url('/assets/datatables/DataTables-1.10.24/js/jquery.dataTables.min.js') }}"></script>
    {{-- <script src="{{ url('/assets/js/demo/datatables-demo.js') }}"></script> --}}
    <!-- End Datatables -->
    <!-- Toggle Sidebar -->
    <script>
        $(function() {
            $('#sidebarCollapse').on('click', function() {
                $('#sidebar, #content').toggleClass('active');
            });
        });
    </script>
    <!-- End Toggle Sidebar -->
    <script>
        // Call the dataTables jQuery plugin
        $(document).ready(function() {
            $('#datatables').DataTable();
        });

    </script>
    <script>
        $(document).ready(function() {
            $(document).on('change', '#bayar', function() {
                var transaksi = $(this).val();
                var total = $('#total').val();
                var kembali = $('#kembalian');
                $.ajax({
                    type: 'get',
                    url: "{{ route('kembalian') }}",
                    data: {
                        bayar: transaksi,
                        total_bayar: total,
                    },
                    dataType: 'json',
                    success: function(data) {
                        kembali.val(data);
                    },
                    error: function() {
                    }
                });
            });
        })
    </script>
        


</body>

</html>
