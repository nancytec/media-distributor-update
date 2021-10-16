<!DOCTYPE html>
<html lang="en" xmlns:livewire="">
<head>
    <meta charset="utf-8">

    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <meta name="description" content="#" />
    <meta name="keywords" content="#" />
    <meta name="DC.title" content="#" />
    <meta name="copyright" content="Copyright-loveworldbooks.com.net: {{date("Y", time())}}" />
    <meta name="robots" content="index,index" />
    <meta name="robots" content="index,follow" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <title>Media Distributor</title>

    <!-- Favicons -->
    <link type="image/x-icon" href="#" rel="icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"></link>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('user/css/bootstrap.min.css')}}">

    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="{{asset('user/plugins/fontawesome/css/fontawesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('user/plugins/fontawesome/css/all.min.css')}}">


    <!-- Owl Carousel CSS -->
    <link rel="stylesheet" href="{{asset('user/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('user/css/owl.theme.default.min.css')}}">

    <!-- Main CSS -->
    <link rel="stylesheet" href="{{asset('user/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('admin/css/toastr.css')}}">
    <script src="{{asset('css/app.css')}}"></script>
    <!--Laravel livewire styles  -->
    <livewire:styles />


</head>
<body>
<style>
    @media only screen and (min-width: 768px) {
        /* For desktop: */
        .account-box{
            max-width: 70% !important;
        }
    }

    @media only screen and (max-width: 768px) {
        /* For mobile phones: */
        .account-box{
            max-width: 100% !important;
        }
    }
</style>
<!-- Loader -->

<!-- /Loader  -->
<!-- Header -->


<div class="main-wrapper">

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <!-- Page Content -->
    <div class="content success-page-cont" style="margin-top: 40px;">
        <div class="container-fluid ">
            <div style="text-align: center;" class="justify-content-center">
                <h1 style="font-size: 350%;">Media Distributors</h1>
                <p>Please select type of account you’d like to login to on media distributors.</p>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-4 row-lg-2">

                    <!-- Success Card -->
                    <div class="card success-card">
                        <div class="card-body">
                            <div class="success-cont">
                                <i class="fas fa-user"></i>
                                <h3>Member!</h3>
                                <p>I'd like to login as a member.</p>
                                <a  href="{{route('member.login')}}" class="btn btn-primary view-inv-btn" style="background-color: #1E88E5; border-color: #1E88E5" >Login Now</a>
                            </div>
                        </div>
                    </div>
                    <!-- /Success Card -->

                </div>
                <div class="col-lg-4 row-lg-2">

                    <!-- Success Card -->
                    <div class="card success-card">
                        <div class="card-body">
                            <div class="success-cont">
                                <i class="fas fa-users" ></i>
                                <h3>Church!</h3>
                                <p>I'd like to login as a church</p>
                                <a href="{{route('church.login')}}" class="btn btn-primary view-inv-btn" style="background-color: #1E88E5; border-color: #1E88E5;">Login Now</a>
                            </div>
                        </div>
                    </div>
                    <!-- /Success Card -->

                </div>
            </div>
            <div style="text-align: center;" class="justify-content-center">
                <p>If you don't have a member account? <a href="{{route('member.generate-media-link')}}" style="color: #1E88E5">Generate yours here</a> .</p>
            </div>
            <br>

        </div>
    </div>
    <!-- /Page Content -->

</div>
<!-- /.content-wrapper -->


    <!-- Footer Bottom -->
    <div class="footer-bottom">
        <div class="container-fluid">

            <!-- Copyright -->
            <div class="copyright">
                <div class="row">
                    <div class="col-12 text-center">
                        <div class="copyright-text">
                            <p class="mb-0">&copy; {{Carbon\Carbon::now()->format('Y')}} Loveworld Publishing Limited. All rights reserved.</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Copyright -->

        </div>
    </div>
    <!-- /Footer Bottom -->

    </footer>
    <!-- /Footer -->
</div>
<livewire:scripts />
<!-- jQuery -->
<script src="{{asset('user/js/jquery.min.js')}}"></script>

<!-- Bootstrap Core JS -->
<script src="{{asset('user/js/popper.min.js')}}"></script>
<script src="{{asset('user/js/bootstrap.min.js')}}"></script>

<!-- Owl Carousel -->
<script src="{{asset('user/js/owl.carousel.min.js')}}"></script>


<!-- Circle Progress JS -->
<script src="{{asset('user/js/circle-progress.min.js')}}"></script>
<!-- Custom JS -->
<script src="{{asset('user/js/script.js')}}"></script>



</body>


</html>
