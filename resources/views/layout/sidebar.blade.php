<aside>
    <div id="sidebar" class="nav-collapse">

        <!-- sidebar menu start-->
        <div class="leftside-navigation">

            <ul class="sidebar-menu" id="nav-accordion">

                {{-- <li>
                    <a href="#">
                        <i class="fa fa-user"></i>
                        <span>Quản Lý Nhân Sự</span>
                    </a>
                </li> --}}

                <li>
                    <a href="{{ route('dashboard.home') }}">
                        <i class="fa fa-dashboard"></i>
                        <span>Tổng Quan</span>
                    </a>
                </li>

                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-user"></i>
                        <span>Quản Lý Nhân Sự</span>
                    </a>
                    <ul class="sub">
						<li><a class="fa fa-diamond" href="#"> Admin</a></li>
						<li><a class='fa fa-street-view' href="{{route('user.index')}}"> Nhân Sự</a></li>
                        {{-- <li><a href="#">Grids</a></li> --}}
                    </ul>
                </li>

                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-book"></i>
                        <span>Loại Sản Phẩm</span>
                    </a>
                    <ul class="sub">
						<li><a href="{{ route('category.index') }}">Thêm Loại Sản Phẩm</a></li>
						<li><a href="{{route('category.trash')}}">Kho Lưu Trử</a></li>
                        {{-- <li><a href="#">Grids</a></li> --}}
                    </ul>
                </li>

                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-shopping-bag"></i>
                        <span>Sản Phẩm</span>
                    </a>
                    <ul class="sub">
                        <li><a  class="active" href="{{route('product.index')}}">Thêm Sản Phẩm</a></li>
                        <li><a href="#">Kho Lưu Trử</a></li>
                    </ul>
                </li>

                <li>
                    <a href="#">
                        <i class="fa fa-users"></i>
                        <span>Quản Lý Khách Hàng</span>
                    </a>
                </li>

                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-book"></i>
                        <span>Quản Lí Đơn Hàng</span>
                    </a>
                    <ul class="sub">
                        <li><a href="#">Đơn Chờ Xác Nhận</a></li>
                        <li><a href="#">Đơn Đang Vận</a></li>
						{{-- <li><a href="#">Dropzone</a></li> --}}
                    </ul>
                </li>

                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-envelope"></i>
                        <span>Mail </span>
                    </a>
                    <ul class="sub">
                        <li><a href="mail.html">Inbox</a></li>
                        <li><a href="mail_compose.html">Compose Mail</a></li>
                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class=" fa fa-bar-chart-o"></i>
                        <span>Thống kê</span>
                    </a>
                    <ul class="sub">
                        <li><a href="#">Chart js</a></li>
                        <li><a href="#">Flot Charts</a></li>
                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class=" fa fa-bar-chart-o"></i>
                        <span>Maps</span>
                    </a>
                    <ul class="sub">
                        <li><a href="google_map.html">Google Map</a></li>
                        <li><a href="vector_map.html">Vector Map</a></li>
                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-glass"></i>
                        <span>Extra</span>
                    </a>
                    <ul class="sub">
                        <li><a href="gallery.html">Gallery</a></li>
						<li><a href="404.html">404 Error</a></li>
                        <li><a href="registration.html">Registration</a></li>
                    </ul>
                </li>

            </ul>
          </div>
        <!-- sidebar menu end-->
    </div>
</aside>
