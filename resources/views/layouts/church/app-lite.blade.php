<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Loveworld Books</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{asset('church/plugins/fontawesome-free/css/all.min.css')}}">

    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{asset('church/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('church/dist/css/adminlte.min.css')}}">
    <!-- Ekko Lightbox -->
    <link rel="stylesheet" href="{{asset('church/plugins/ekko-lightbox/ekko-lightbox.css')}}">

    <link rel="stylesheet" href="{{asset('church/plugins/fontawesome-free/css/all.min.css')}}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="{{asset('church/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">

    <link rel="stylesheet" href="{{asset('church/plugins/summernote/summernote-bs4.min.css')}}">

    <link rel="stylesheet" href="{{asset('church/dist/css/toastr.css')}}">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.min.css" crossorigin="anonymous">


    <!--Laravel livewire styles  -->
    <livewire:styles />

</head>


<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">

    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
        <img class="animation__wobble" src="{{asset('church/dist/img/AdminLTELogo.png')}}" alt="AdminLTELogo" height="60" width="60">
    </div>

    <!-- /.navbar -->

    <!-- Main Sidebar Container -->



    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        @yield('content')
    </div>


    <!-- Main Footer -->
    <footer class="main-footer">
        <strong>Copyright &copy; {{Carbon\Carbon::now()->format('Y')}} <a href="#">Media Distributors</a>.</strong>
        All rights reserved.
        <div class="float-right d-none d-sm-inline-block">
            <b>Powered by</b> Loveworld Books
        </div>
    </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!--Livewire script-->
<livewire:scripts />
<!-- jQuery -->
<script src="{{asset('church/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap -->
<script src="{{asset('church/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src={{asset('church/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}""></script>

<!-- Summernote -->
<script src="{{asset('church/plugins/summernote/summernote-bs4.min.js')}}"></script>

<!-- AdminLTE App -->
<script src="{{asset('church/dist/js/adminlte.js')}}"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="{{asset('church/plugins/jquery-mousewheel/jquery.mousewheel.js')}}"></script>
<script src="{{asset('church/plugins/raphael/raphael.min.js')}}"></script>
<script src="{{asset('church/plugins/jquery-mapael/jquery.mapael.min.js')}}"></script>
<script src="{{asset('church/plugins/jquery-mapael/maps/usa_states.min.js')}}"></script>
<!-- ChartJS -->
<script src="{{asset('church/plugins/chart.js/Chart.min.js')}}"></script>


<!-- AdminLTE for demo purposes -->
<script src="{{asset('church/dist/js/demo.js')}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{asset('church/dist/js/pages/dashboard2.js')}}"></script>

<script  src="{{asset('church/dist/js/toastr.js')}}"></script>

<!-- Ekko Lightbox -->
<script src="{{asset('church/plugins/ekko-lightbox/ekko-lightbox.min.js')}}"></script>
<!-- AdminLTE App -->
<!-- Filterizr-->
<script src="{{asset('church/plugins/filterizr/jquery.filterizr.min.js')}}"></script>

<!-- Page specific script -->
<script>
    $(function () {
        $(document).on('click', '[data-toggle="lightbox"]', function(event) {
            event.preventDefault();
            $(this).ekkoLightbox({
                alwaysShowClose: true
            });
        });

        $('.filter-container').filterizr({gutterPixels: 3});
        $('.btn[data-filter]').on('click', function() {
            $('.btn[data-filter]').removeClass('active');
            $(this).addClass('active');
        });
    })
</script>

<script>
    window.livewire.on('alert', param => {
        toastr[param['type']](param['message'], param['type']);
    });
</script>

<script>
    function disableBtn(){
        $('#form').submit(function(){
            $(this).find(':input[type=submit]').prop('disabled', true);
        });
    }
</script>

<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
</body>
</html>

