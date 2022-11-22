<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Basic Page Needs
  ================================================== -->
  <meta charset="utf-8">
  <title>Now | SaiG</title>
  <!-- Mobile Specific Metas
  ================================================== -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description" content="Construction Html5 Template">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
  <meta name="author" content="Themefisher">
  <meta name="generator" content="Themefisher Constra HTML Template v1.0">

  <!-- theme meta -->
  <meta name="theme-name" content="aviato" />

  <!-- Favicon -->
  <link rel="shortcut icon" type="image/x-icon" href="{{asset('shops/images/favicon.png')}}" />

  <!-- Themefisher Icon font -->
  <link rel="stylesheet" href="{{asset('shops/plugins/themefisher-font/style.css')}}">
  <!-- bootstrap.min css -->
  <link rel="stylesheet" href="{{asset('shops/plugins/bootstrap/css/bootstrap.min.css')}}">

  <!-- Animate css -->
  <link rel="stylesheet" href="{{asset('shops/plugins/animate/animate.css')}}">
  <!-- Slick Carousel -->
  <link rel="stylesheet" href="{{asset('shops/plugins/slick/slick.css')}}">
  <link rel="stylesheet" href="{{asset('shops/plugins/slick/slick-theme.css')}}">

  <!-- Main Stylesheet -->
  <link rel="stylesheet" href="{{asset('shops/css/style.css')}}">

</head>

<body id="body">

<!-- Start Top Header Bar -->
@include('shop.layout.header')
<!-- End Top Header Bar -->


<!-- Main Menu Section -->
@include('shop.layout.sidebar')
{{-- end --}}

@yield('contentShop')
<!--
Start Call To Action
==================================== -->


@include('shop.layout.footer')

    <!--
    Essential Scripts
    =====================================-->

    <!-- Main jQuery -->
    <script src="{{asset('shops/plugins/jquery/dist/jquery.min.js')}}"></script>
    <!-- Bootstrap 3.1 -->
    <script src="{{asset('shops/plugins/bootstrap/js/bootstrap.min.js')}}"></script>
    <!-- Bootstrap Touchpin -->
    <script src="{{asset('shops/plugins/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.js')}}"></script>
    <!-- Instagram Feed Js -->
    <script src="{{asset('shops/plugins/instafeed/instafeed.min.js')}}"></script>
    <!-- Video Lightbox Plugin -->
    <script src="{{asset('shops/plugins/ekko-lightbox/dist/ekko-lightbox.min.js')}}"></script>
    <!-- Count Down Js -->
    <script src="{{asset('shops/plugins/syo-timer/build/jquery.syotimer.min.js')}}"></script>

    <!-- slick Carousel -->
    <script src="{{asset('shops/plugins/slick/slick.min.js')}}"></script>
    <script src="{{asset('shops/plugins/slick/slick-animation.min.js')}}"></script>

    <!-- Google Mapl -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCC72vZw-6tGqFyRhhg5CkF2fqfILn2Tsw"></script>
    <script type="text/javascript" src="{{asset('shops/plugins/google-map/gmap.js')}}"></script>

    <!-- Main Js File -->
    <script src="{{asset('shops/js/script.js')}}"></script>

    <script src="sweetalert2.min.js"></script>
<link rel="stylesheet" href="sweetalert2.min.css">
    <script src="sweetalert2.all.min.js"></script>
<script>
     @php
       if(Session::has('message')){
       @endphp
        Swal.fire({
            position: 'top-end',
            icon: 'success',
            title: "{{ Session::get('message') }}",
            showConfirmButton: false,
            timer: 1500
        })
        @php
       }
        @endphp

	</script>

  </body>
  </html>
