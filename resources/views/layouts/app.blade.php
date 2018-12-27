<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="icon" href="img/favicon.png" type="image/png">
  <title>Kare Charity</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
  <link rel="stylesheet" href="{{asset('vendors/linericon/style.css')}}">
  <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}">
  <link rel="stylesheet" href="{{asset('vendors/owl-carousel/owl.carousel.min.css')}}">
  <link rel="stylesheet" href="{{asset('vendors/lightbox/simpleLightbox.css')}}">
  {{--<link rel="stylesheet" href="{{asset('vendors/nice-select/css/nice-select.css')}}">--}}
  <link rel="stylesheet" href="{{asset('vendors/animate-css/animate.css')}}">
  <link rel="stylesheet" href="{{asset('vendors/jquery-ui/jquery-ui.css')}}">
  <!-- main css -->
  <link rel="stylesheet" href="{{asset('css/style.css')}}">
  <link rel="stylesheet" href="{{asset('css/responsive.css')}}">
   <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="token"   id="token" value="{{ auth()->check() ? auth()->user()->id : 'null' }}">
  <script type='text/javascript' src='//platform-api.sharethis.com/js/sharethis.js#property=5c17de261c98570011922d1d&product=social-ab' async='async'></script>
  @yield('links')
  <style>
     .main_btn3{
            display: inline-block;
            background: #222222;
            padding: 0px 30px;
            color: #fff;
            font-family: "Roboto", sans-serif;
            font-size: 14px;
            font-weight: 500;
            line-height: 48px;
            border: 1px solid #222222;
            border-radius: 0px;
            outline: none !important;
            box-shadow: none !important;
            text-align: center;
            cursor: pointer;
            transition: all 300ms linear 0s;
            border-radius: 5px;
            text-transform: capitalize;
            margin-top: 30px;
            float: right;
        }
        .main_btn3:hover {
          background: #e51d2b;
          color: #ffffff;
          border: 1px solid #e51d2b;
       }
  </style>
</head>

<body>


<!--================Header Menu Area =================-->
@include('layouts.contents.header')
<!--================ End Footer Area  =================-->
<div  id="app">
@yield('content')
</div>
@include('layouts.contents.footer')
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="{{asset('js/jquery-3.2.1.min.js')}}"></script>
<script src="{{asset('js/popper.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<!-- <script src="vendors/lightbox/simpleLightbox.min.js"></script> -->
{{--<script src="{{asset('vendors/nice-select/js/jquery.nice-select.min.js')}}"></script>--}}
<!-- <script src="vendors/isotope/imagesloaded.pkgd.min.js"></script> -->
<script src="{{asset('vendors/isotope/isotope-min.js')}}"></script>
<script src="{{asset('vendors/owl-carousel/owl.carousel.min.js')}}"></script>
<script src="js/jquery.ajaxchimp.min.js"></script>
<!-- <script src="vendors/counter-up/jquery.waypoints.min.js"></script> -->
<!-- <script src="vendors/flipclock/timer.js"></script> -->
<!-- <script src="vendors/counter-up/jquery.counterup.js"></script> -->
<script src="{{asset('js/mail-script.js')}}"></script>
<script src="{{asset('js/custom.js')}}"></script>
<script src="{{asset('js/push.js')}}"></script>
<script src="{{asset('js/serviceWorker.min.js')}}"></script>
<script src="{{asset('js/app.js')}}"></script>
@yield('scripts')
</body>

</html>