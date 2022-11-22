<!DOCTYPE html>

<html lang="en">
<head>

  <!-- Basic Page Needs
  ================================================== -->
  <meta charset="utf-8">
  <title>Aviato | E-commerce template</title>

  <!-- Mobile Specific Metas
  ================================================== -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description" content="Construction Html5 Template">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
  <meta name="author" content="Themefisher">
  <meta name="generator" content="Themefisher Constra HTML Template v1.0">

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

<section class="signin-page account">
  <div class="container">
    <div class="row">
      <div class="col-md-6 col-md-offset-3">
        <div class="block text-center">
          <a class="logo" href="index.html">
            <img src="images/logo.png" alt="">
          </a>
          <h2 class="text-center">Chào Mừng Bạn Trở Lại</h2>
          <form class="text-left clearfix" method="POST" action="{{route('shop.checklogin')}}"  >
            @method('POST')
            @csrf
            <div class="form-group">
              <input type="email" class="form-control" name="email"  placeholder="Email" required="">
            </div>
            <div class="form-group">
              <input type="password" class="form-control" name="password" placeholder="Mật khẩu" required="">
            </div>
            <div class="text-center">
              <button type="submit" class="btn btn-main text-center" >Đăng nhập</button>
            </div>
          </form>
          <p class="mt-20">Bạn là Người Mới?<a href="{{route('shop.register')}}"> Tạo Tài Khoản Đăng Nhập</a></p>
        </div>
      </div>
    </div>
  </div>
</section>

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

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
            @php
           if(Session::has('message')){
           @endphp
           Swal.fire({
                icon: 'error',
                title: 'Đăng nhập thất bại!',
                text: "Thông tin đăng nhập không chính xác",
                showClass: {
                popup: 'swal2-show'
                    }
                })
            @php
           }
            @endphp

            @php
           if(Session::has('ok')){
           @endphp
           Swal.fire({
                icon: 'success',
                title: 'Đăng ký thành công!',
                text: "Vui lòng đăng nhập",
                showClass: {
                popup: 'swal2-show'
                    }
                })
            @php
           }
            @endphp
    </script>

  </body>
  </html>
