<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>Password reset</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('church/plugins/fontawesome-free/css/all.min.css')}}">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{asset('church/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('church/dist/css/adminlte.min.css')}}">

    <link rel="stylesheet" href="{{asset('church/dist/css/toastr.css')}}">
    <!--Laravel livewire styles  -->
    <livewire:styles />
    <style>
        .footer{
            max-height: 10vh;
            width: 100%;
            position: fixed;
            top: auto;
            bottom: 0;
            display: inline-block;
        }
        .img {
            margin: 10px;
        }
    </style>
</head>


<body class="hold-transition login-page">

<div>
    @livewire('admin-password-reset')
</div>
<footer class='footer'>
    <p class='text-center py-2' style="color: black; font-size: 1rem; ">
        Copyright &copy; Loveworld Publishing Limited
    </p>
</footer>

<!-- jQuery -->
<!--Livewire script-->
<livewire:scripts />

<script src="{{asset('church/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('church/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('church/dist/js/adminlte.min.js')}}"></script>

<script  src="{{asset('church/dist/js/toastr.js')}}"></script>
<script>
    window.livewire.on('alert', param => {
        toastr[param['type']](param['message'], param['type']);
    });
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
        })
            .then((willDelete) => {
                if(willDelete){
                    window.livewire.emit('delete', event.detail.id);
                }
            });
    });
</script>
</body>
</html>
