@extends('master')
@section('content')
    <style>
        img#avtshow {
            border: 3px solid rgb(150, 0, 0);
            padding: 10px;
            border-radius: 50%;

        }

    </style>
    <section class="wrapper">
        <div class="table-agile-info">

            <div class="panel-panel-default">
                <header class="page-title-bar">
                    <a href="{{ route('dashboard.home') }}" class="w3-button w3-red">Trang chủ</a>
                    <h1 class="page-title">Thông tin</h1>
                </header>
                 <!-- Modal -->



                <hr>
                <div class="panel-heading">

                </div>
                <div>
                    <table class="table" ui-jq="footable"
                        ui-options='{
            "paging": {
              "enabled": true
            },
            "filtering": {
              "enabled": true
            },
            "sorting": {
              "enabled": true
            }}'>

                        <div class="gallery-grids">
                            <div class="gallery-top-grids">

                                <div class="col-sm-3 com-w3ls">
                                    <section class="panel">
                                        <div class="gallery-grid">
                                            <br>
                                            <a class="example-image-link"
                                                href="{{ asset('storage/images/' . $user->image) }}"
                                                data-lightbox="example-set"
                                                data-title="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus vitae cursus ligula">
                                                <img id="avtshow" src="{{ asset('storage/images/' . $user->image) }}"
                                                    alt="" />
                                                <div class="captn">
                                                    <h4>Xem Avt</h4>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="panel-body">
                                            <h3>{{ $user->name }}</h3>
                                            <ul class="nav nav-pills nav-stacked labels-info ">
                                                <li>
                                                    <h4>{{ $user->group->name }}</h4>
                                                </li>
                                            </ul>
                                            <div class="text-center">
                                                <a class="btn mini btn-default" href="#">
                                                    <i class="fa fa-cog"> Thông tin</i>
                                                </a>
                                                <a class="btn mini btn-default" href="#">
                                                    <i class="fa fa-cog"> Mật Khẩu </i>
                                                </a>
                                            </div>
                                        </div>
                                    </section>
                                </div>
                                <div class="social-links mt-2">
                                    <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                                    <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                                    <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                                    <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
                                  </div>

                                <div class="col-sm-9 com-w3ls">
                                    <section class="panel">
                                        <div class="gallery-grid">
                                            <div class="panel-body">
                                                <ul class="nav nav-pills nav-stacked labels-info ">
                                                    <li>
                                                        <h3>Tên: {{ $user->name }}</h3>
                                                    </li>
                                                    <hr>
                                                    <li>
                                                        <h3>Email: {{ $user->email }}</h3>
                                                    </li>

                                                    <li>
                                                        <h3>Số điện thoại: {{ $user->phone }}</h3>
                                                    </li>
                                                    <hr>
                                                    <li>
                                                        <h3>Địa chỉ: {{ $user->address }}</h3>
                                                    </li>
                                                    <li>
                                                        <h3>Giới tính: {{ $user->gender }}</h3>
                                                    </li>
                                                    <li>
                                                        <h3>Ngày sinh: {{ $user->birthday }}</h3>
                                                    </li>
                                                    <hr>
                                                    <li>
                                                        <h3>Đã tham gia: {{ $user->created_at }}</h3>
                                                    </li>
                                                </ul>
                                                <br>
                                                <br>
                                            </div>
                                        </div>
                                    </section>
                                </div>



                            </div>
                        </div>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection
