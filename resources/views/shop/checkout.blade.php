@extends('shop.masterShop')
@section('contentShop')
    <section class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="content">
                        <h1 class="page-name">Checkout</h1>
                        <ol class="breadcrumb">
                            <li><a href="index.html">Home</a></li>
                            <li class="active">cart</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="page-wrapper">
        <div class="checkout shopping">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <div class="block billing-details">
                            <h4 class="widget-title">Thông Tin Cơ Bản</h4>
                            <form class="checkout-form" method="POST" action="{{ route('order') }}" >
                                @csrf
                                @if (isset(Auth()->guard('customers')->user()->name))
                                    <div class="form-group">
                                        <label for="full_name">Họ Và Tên</label>
                                        <input name="name" type="text" class="form-control"
                                            value="{{ Auth()->guard('customers')->user()->name }}" id="full_name"
                                            placeholder="">
                                    </div>
                                    <div class="form-group">
                                        <label for="user_address">Địa Chỉ Giao Hàng</label>
                                        <input name="address" type="text" class="form-control"
                                            value="{{ Auth()->guard('customers')->user()->address }}" id="user_address"
                                            placeholder="">
                                    </div>
                                    <div class="checkout-country-code clearfix">
                                        <div class="form-group">
                                            <label for="user_post_code">Số điện thoại</label>
                                            <input name="phone" type="text" class="form-control"
                                                value="{{ Auth()->guard('customers')->user()->phone }}" id="user_post_code">
                                        </div>
                                        <div class="form-group">
                                            <label for="user_city">Email</label>
                                            <input type="text" class="form-control" name="email"
                                                value="{{ Auth()->guard('customers')->user()->email }}" id="user_city">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="user_country">Ghi chú*</label>
                                        <input type="text" class="form-control" id="user_country" name="note">
                                    </div>

                                        {{-- <a href="{{ route('checkOuts') }}" class="btn btn-main pull-right">Checkout</a> --}}
                                        <button type="submit" class="btn btn-main mt-20">Đặt Hàng</button>
                                @else
                                <h4>Vui lòng đăng nhập trước khi thanh toán nhé</h4>
                                <a href="{{ route('shop.viewlogin') }}" class="btn btn-main">Đăng Nhập</a>
                                @endif

                        </div>
                    </div>

                    @php $totalAll = 0 @endphp

                    <div class="block">
                        <h4 class="widget-title">Tóm Tắt</h4>
                        <div class="media product-card">
                            <div class="media-body">
                                @if (session('cart'))
                                    @foreach (session('cart') as $id => $details)
                                        @php
                                            $total = $details['price'] * $details['quantity'];
                                            $totalAll += $total;
                                        @endphp
                                            <input type="hidden" value="{{ $id }}"
                                            name="product_id[]">{{ $details['nameVi'] ?? '' }} x
                                            <input type="hidden" value="{{ $details['quantity'] }}"
                                            name="quantity[]">{{ $details['quantity'] ?? '' }}
                                        <p class="price">Số Lượng: {{ $details['quantity'] }}</p>
                                        <p class="">Giá: {{ number_format($details['price']) }}</p>
                                        <td><input type="hidden" value="{{ $total }}"
                                            name="total[]">{{ number_format($total) }}.vnd</td>
                                    @endforeach
                                @endif
                                <hr>
                                <tr>
                                    <td>Tổng tiền</td>
                                    <td><input type="hidden" name="totalAll"
                                            value="{{ $totalAll }}">{{ number_format($totalAll) }}.vnd</td>
                                </tr>
                            </div>
                        </div>
                        <div class="discount-code">

                        </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

@endsection
