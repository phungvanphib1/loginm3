<!DOCTYPE html>
<head>
<title>Visitors an Admin Panel Category Bootstrap Responsive Website Template | Login :: w3layouts</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Visitors Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- bootstrap-css -->
<link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css')}}" >
<!-- //bootstrap-css -->
<!-- Custom CSS -->
<link href="{{ asset('assets/css/style.css')}}" rel='stylesheet' type='text/css' />
<link href="{{ asset('assets/css/style-responsive.css')}}" rel="stylesheet"/>
<!-- font CSS -->
<link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
<!-- font-awesome icons -->
<link rel="stylesheet" href="{{ asset('assets/css/font.css')}}" type="text/css"/>
<link href="{{ asset('assets/css/font-awesome.css')}}" rel="stylesheet">
<!-- //font-awesome icons -->
<script src="js/jquery2.0.3.min.js')}}"></script>
</head>
<body>
<div class="log-w3">
<div class="w3layouts-main">
	<h2>Đăng nhập Now</h2>
		<form action="{{ Route('handdle-login') }}" method="post">

            @csrf
			<input type="email" class="ggg"  value="{{old('email')}}" name="email" placeholder="E-MAIL" required="">
			<input type="password" class="ggg" name="password" placeholder="MẬT KHẨU" required="">
			<span><input type="checkbox" />Lưu</span>
			<h6><a href="#">Quên mật khẩu</a></h6>
				<div class="clearfix"></div>
				<input type="submit" value="Đăng nhập" >
		</form>
		<p>Bạn chưa có tài khoản?<a href="{{ route('viewRegister') }}">Đăng kí tài khoản</a></p>
</div>
</div>
<script src="{{ asset('assets/js/bootstrap.js')}}"></script>
<script src="{{ asset('assets/js/jquery.dcjqaccordion.2.7.js')}}"></script>
<script src="{{ asset('assets/js/scripts.js')}}"></script>
<script src="{{ asset('assets/js/jquery.slimscroll.js')}}"></script>
<script src="{{ asset('assets/js/jquery.nicescroll.js')}}"></script>
<!--[if lte IE 8]><script language="javascript" type="text/javascript" src="js/flot-chart/excanvas.min.js')}}"></script><![endif]-->
<script src="{{ asset('assets/js/jquery.scrollTo.js')}}"></script>
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
</script>
</body>
</html>
