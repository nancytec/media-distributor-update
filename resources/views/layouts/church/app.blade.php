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
    <link rel="stylesheet" href="{{asset('church/dist/css/barchart.less')}}">

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

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="{{route('church.dashboard')}}" class="nav-link">Home</a>
                </li>
            </ul>
        </ul>

        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
            <!-- Navbar Search -->
            <!-- Messages Dropdown Menu -->
            <li class="nav-item dropdown">
                <a class="nav-link"  href="{{route('church.logout')}}">
                    <i class="far fa-user"></i>
                    <span class="badge badge-danger navbar-badge">Logout</span>
                </a>
            </li>

        </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-light-primary elevation-4">
        <!-- Brand Logo -->
        <a href="{{route('church.dashboard')}}" class="brand-link">
            <img src="{{asset('church/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
            <span class="brand-text font-weight-light">LOVEWORLD</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="{{Auth::user()->ImagePath}}" class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="info">
                    <a href="#" class="d-block">{{Auth::user()->name}}</a>
                </div>
            </div>

            <!-- SidebarSearch Form -->
            <div class="form-inline">
                <div class="input-group" data-widget="sidebar-search">
                    <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                    <div class="input-group-append">
                        <button class="btn btn-sidebar">
                            <i class="fas fa-search fa-fw"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
                         with font-awesome or any other icon font library -->
                    <li class="nav-item menu-open">
                        <a href="{{route('church.dashboard')}}" class="nav-link  @if(Route::currentRouteName() == 'church.dashboard') active @endif">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                Dashboard
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('church.members-list')}}" class="nav-link  @if(Route::currentRouteName() == 'church.members-list') active @endif">
                            <i class="nav-icon fas fa-users"></i>
                            <p>
                                Members
                                <span class="right badge badge-primary">Users</span>
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('church.new-member')}}" class="nav-link  @if(Route::currentRouteName() == 'church.new-member') active @endif">
                            <i class="nav-icon fas fa-user-plus"></i>
                            <p>
                                Add Member
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('church.all-media')}}" class="nav-link">
                            <i class="nav-icon fas fa-file"></i>
                            <p>
                                All media
                                <span class="right badge badge-primary">uploaded</span>
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('church.shared-links')}}" class="nav-link @if(Route::currentRouteName() == 'church.shared-links') active @endif">
                            <i class="nav-icon fas fa-link"></i>
                            <p>
                                Shared Links
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('church.analytics')}}" class="nav-link @if(Route::currentRouteName() == 'church.analytics') active @endif ">
                            <i class="nav-icon fas fa-chart-pie"></i>
                            <p>
                                Analytics
                            </p>
                        </a>
                    </li>

                    <li class="nav-header"> *** CHURCH DASHBOARD ***</li>
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>



    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        @yield('content')
    </div>


    <!-- Main Footer -->
    <footer class="main-footer">
        <div class="float-right d-none d-sm-inline-block">
            <b>Copyright &copy; {{Carbon\Carbon::now()->format('Y')}} Loveworld Publishing Limited.</b>  All rights reserved.
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

<script  src="{{asset('church/dist/js/sweetalert.js')}}"></script>
<script>
    window.addEventListener('swal:modal', event => {
        swal({
            title: event.detail.title,
            text: event.detail.text,
            icon: event.detail.type
        });
    });

    window.addEventListener('swal:confirm', event => {
        swal({
            title: event.detail.title,
            text: event.detail.text,
            icon: event.detail.type,
            buttons: true,
            dangerMode: true
        }).then((willDelete) => {

                if(willDelete){
                    window.livewire.emit('delete', event.detail.id);
                }
            });
    });
</script>


<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
<script src="https://cdn.jsdelivr.net/npm/less@4.1.1" ></script>
</body>
</html>

