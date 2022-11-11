<!DOCTYPE html>
<head>
<title>Visitors an Admin Panel Category Bootstrap Responsive Website Template | Registration :: w3layouts</title>
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
<script src="{{ asset('assets/js/jquery2.0.3.min.js')}}"></script>
</head>
<body>
<div class="reg-w3">
<div class="w3layouts-main">
	<h2>Đăng ký tài kho</h2>
		<form action="{{ Route('handdle-register') }}" method="post">
            @csrf
			<input type="text" class="ggg" name="name" placeholder="NAME" required="">

			<input type="email" class="ggg" name="email" placeholder="E-MAIL" required="">

			<input type="password" class="ggg" name="confirm_password" placeholder="MẬT KHẨU" required="">

			<input type="password" class="ggg" name="password" placeholder="NHẬP LẠI MẬT KHẨU" required="">

			<h4><input type="checkbox" />Tôi đồng ý với Điều khoản dịch vụ và Chính sách quyền riêng tư</h4>

				<div class="clearfix"></div>
				<input type="submit" value="submit" name="register">
		</form>
		<p>Quay lại trang<a href="{{Route('login')}}">Đăng nhập</a></p>
</div>
</div>
<script src="{{ asset('assets/js/bootstrap.js')}}"></script>
<script src="{{ asset('assets/js/jquery.dcjqaccordion.2.7.js')}}"></script>
<script src="{{ asset('assets/js/scripts.js')}}"></script>
<script src="{{ asset('assets/js/jquery.slimscroll.js')}}"></script>
<script src="{{ asset('assets/js/jquery.nicescroll.js')}}"></script>
<!--[if lte IE 8]><script language="javascript" type="text/javascript" src="{{ asset('assets/js/flot-chart/excanvas.min.js')}}"></script><![endif]-->
<script src="{{ asset('assets/js/jquery.scrollTo.js')}}"></script>
</body>
</html>
