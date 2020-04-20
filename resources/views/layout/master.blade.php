<!doctype html>
<html lang="en">

<head>
    <title>SPK HMIF</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <!-- VENDOR CSS -->
    <link rel="stylesheet" href="{{asset('sistem/assets/vendor/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('sistem/assets/vendor/font-awesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('sistem/assets/vendor/linearicons/style.css')}}">
    <link rel="stylesheet" href="{{asset('sistem/assets/vendor/chartist/css/chartist-custom.css')}}">
    <!-- MAIN CSS -->
    <link rel="stylesheet" href="{{asset('sistem/assets/css/main.css')}}">
    <!-- FOR DEMO PURPOSES ONLY. You should remove this in your project -->
    <link rel="stylesheet" href="{{asset('sistem/assets/css/demo.css')}}">
    {{-- Data Tabel --}}
    <link rel="stylesheet" type="text/css" href="{{asset('sistem/assets/vendor/DataTables/datatables.min.css')}}">
    <!-- GOOGLE FONTS -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
    {{-- Toastr --}}
    <link rel="stylesheet" href="{{asset('sistem/assets/vendor/toastr/toastr.min.css')}}">
    <!-- ICONS -->
    <link rel="apple-touch-icon" sizes="76x76" href="{{asset('sistem/assets/img/apple-icon.png')}}">
    <link rel="icon" type="{{asset('sistem/image/png')}}" sizes="96x96"
        href="{{asset('sistem/assets/img/favicon.png')}}">
    @yield('header')

</head>

<body>
    <!-- WRAPPER -->
    <div id="wrapper">
        <!-- NAVBAR -->
        @include('layout/includes/_navbar')
        <!-- END NAVBAR -->
        <!-- LEFT SIDEBAR -->
        @include('layout/includes/_sidebar')
        <!-- END LEFT SIDEBAR -->
        <!-- MAIN -->
        @yield('content')
        <!-- END MAIN -->
        <div class="clearfix"></div>
        <footer>
            <div class="container-fluid">
                <p class="copyright">Shared by <i class="fa fa-love"></i><a href="#">HMIF
                        AMIKOM</a>
                </p>
            </div>
        </footer>
    </div>
    <!-- END WRAPPER -->
    <!-- Javascript -->
    <script src="{{asset('sistem/assets/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('sistem/assets/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('sistem/assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
    <script src="{{asset('sistem/assets/scripts/klorofil-common.js')}}"></script>
    <script type="text/javascript" src="{{asset('sistem/assets/vendor/DataTables/datatables.min.js')}}"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/js/bootstrap-editable.min.js">
    </script>
    <script src="{{asset('sistem/assets/scripts/sweetalert.min.js')}}"></script>
    <script src="{{asset('sistem/assets/vendor/toastr/toastr.min.js')}}"></script>
    <script type="text/javascript"
        src="{{asset('sistem/assets/vendor/DataTables/DataTables-1.10.20/js/jquery.dataTables.js')}}">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js">
    </script>
    <script>
        @if(Session::has('sukses'))
            toastr.success("{{Session::get('sukses')}}" , 'Sukses' ) @endif 
    </script>
    <script>
        @if(Session::has('error'))
        toastr.error("Data Gagal Diupdate"); 
        @endif
    </script>
    <script>
        @if(count($errors) > 0)
            @foreach($errors->all() as $error)
                toastr.error("{{ $error }}");
            @endforeach
        @endif
    </script>
    <script>
        $('.QABobot').click (function(){
            swal("Bobot Kriteria", "Nilai Dari Suatu Kriteria yang Ingin ditambahkan, Semakin besar nilainya maka semakin tinggi bobotnya");
        });

    </script>
    <script>
        $('.utility').click (function(){
            swal("Nilai Utility", "Nilai yang didapat Mahasiswa dari Penilaian yang diInputkan dengan metode SMART ");
        });

    </script>
    @yield('footer')
</body>

</html>