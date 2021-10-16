<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Loveworld books - Recreating your world">
    <meta name="keywords" content="Loveworld books, recreating your world, recreating your world author, recreating your world book, recreating your world ebook, recreating your world marketing">

    <meta name="author" content="PencilEdge">

    <title>Recreating your world</title>

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('home/images/favicon.html')}}" />
    <!-- bootstrap.min css -->
    <link rel="stylesheet" href="{{asset('home/plugins/bootstrap/css/bootstrap.min.css')}}">
    <!-- Animate Css -->
    <link rel="stylesheet" href="{{asset('home/plugins/animate-css/animate.css')}}">
    <!--  icon Css -->
    <link rel="stylesheet" href="{{asset('home/')}}plugins/fontawesome/css/all.css">
    <link rel="stylesheet" href="{{asset('home/plugins/flaticon/flaticon.css')}}">
    <link rel="stylesheet" href="{{asset('home/plugins/themify/css/themify-icons.css')}}">
    <link rel="stylesheet" href="{{asset('home/plugins/magnific-popup/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{asset('home/plugins/slick-carousel/slick/slick.css')}}">
    <!-- Owl Carousel CSS -->
    <link rel="stylesheet" href="{{asset('home/plugins/owl-carousel/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('home/plugins/owl-carousel/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Main Stylesheet -->
    <link rel="stylesheet" href="{{asset('home/css/style-3.css')}}">
    <link rel="stylesheet" href="{{asset('home/css/responsive.css')}}">
    <!--Laravel livewire styles  -->
    <livewire:styles />

</head>

<body id="top-header">
<!-- Navigation Menu -->

<!-- NAVBAR
================================================= -->
<div class="main-navigation fixed-top site-header nav-classic large-container" id="mainmenu-area">
    <nav class="navbar navbar-expand-lg ">
        <div class="container align-items-center">
            <a class="navbar-brand smoth-scroll" href="#">
                <h2 class="mb-0">Loveworld publishing</h2>
            </a>
            <!-- Toggler -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarmain" aria-controls="navbarmain" aria-expanded="false" aria-label="Toggle navigation">
                <span class="ti-menu-alt"></span>
            </button>

            <!-- Collapse -->
            <div class="collapse navbar-collapse text-center text-lg-left" id="navbarmain">
                <!-- Links -->
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a href="{{route('select-account')}}" class="nav-link smoth-scroll">
                            Account
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a href="{{route('member.login')}}" class="nav-link smoth-scroll">
                            Member
                        </a>
                    </li>

                    <li class="nav-item ">
                        <a href="{{route('church.login')}}" class="nav-link smoth-scroll">
                            Church
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a href="{{route('member.generate-media-link')}}" class="nav-link smoth-scroll">
                            Generate media
                        </a>
                    </li>

                </ul>

                <ul class="list-inline top-socials-3 mb-0">
                    <li class="list-inline-item">
                        <a href="#"><i class="fa fa-facebook"></i></a>
                    </li>
                    <li class="list-inline-item">
                        <a href="#"><i class="fa fa-twitter"></i></a>
                    </li>
                    <li class="list-inline-item">
                        <a href="mailto:hello@loveworldbooks.com"><i class="fa fa-envelope-o"></i></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</div>
<!--Menu End -->

@yield('content')



<!-- Footer Start -->
<footer class="footer-dark">
    <div class="shape-container shape-line shape-position-top shape-orientation-inverse"><svg width="2560px" height="100px" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://loveworldbooks.com" preserveAspectRatio="none" x="0px" y="0px" viewBox="0 0 2560 100" style="enable-background:new 0 0 2560 100" xml:space="preserve" class=""><polygon points="2560 0 2560 100 0 100"></polygon></svg></div>

    <div class="footer-copyright">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-7">
                    <p class="footer-copy text-white-50 mb-sm-4 mb-lg-0 mb-md-0">
                        &copy; Copyright <span class="current-year">Loveworld Books</span> All rights reserved-2021.
                    </p>
                </div>
                <div class="col-lg-6 col-md-5">
                    <ul class="list-inline text-md-right mb-0">
                        <li class="list-inline-item"><a href="{{route('member.login')}}">Member login |</a></li>
                        <li class="list-inline-item"><a href="{{route('church.login')}}">Church login</a></li>
                    </ul>
                </div>
            </div> <!-- / .row -->
        </div>
    </div>
</footer>
<!--  Footer End -->

<!--  Page Scroll to Top  -->

<a class="scroll-to-top smoth-scroll" href="#top-header">
    <i class="ti-angle-up"></i>
</a>




<!--
Essential Scripts
=====================================-->

<!--Livewire script-->
<livewire:scripts />
<!-- Main jQuery -->
<script src="{{asset('home/js/jquery.js')}}"></script>
<script src="{{asset('home/js/email-decode.min.js')}}"></script>
<!-- Bootstrap 4.3.1 -->
<script src="{{asset('home/plugins/bootstrap/js/popper.min.js')}}"></script>
<script src="{{asset('home/plugins/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{asset('home/plugins/owl-carousel/owl.carousel.min.js')}}"></script>
<script src="{{asset('home/plugins/magnific-popup/jquery.magnific-popup.js')}}"></script>
<script src="{{asset('home/plugins/slick-carousel/slick/slick.min.js')}}"></script>
<!-- Counter Js -->
<script src="{{asset('home/plugins/counterup/waypoint.js')}}"></script>
<script src="{{asset('home/plugins/counterup/jquery.counterup.min.js')}}"></script>
<script src="{{asset('home/plugins/animate-css/wow.min.js')}}"></script>
<script src="{{asset('home/plugins/countdown/countdown.jquery.js')}}"></script>
<script src="{{asset('home/js/contact.js')}}"></script>
<script src="{{asset('home/js/theme.js')}}"></script>
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


</body>

</html>
