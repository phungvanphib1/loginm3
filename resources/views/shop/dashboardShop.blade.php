@extends('shop.masterShop')
@section('contentShop')
<div class="hero-slider">
    <div class="slider-item th-fullpage hero-area" style="background-image: url(shops/images/slider/slider-2.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 text-center">
                    <p data-duration-in=".3" data-animation-in="fadeInUp" data-delay-in=".1">PRODUCTS</p>
                    <h1 data-duration-in=".3" data-animation-in="fadeInUp" data-delay-in=".5">Now
                        SaiG.</h1>
                    <a data-duration-in=".3" data-animation-in="fadeInUp" data-delay-in=".8" class="btn"
                        href="shop.html">Shop Now</a>
                </div>
            </div>
        </div>
    </div>
    <div class="slider-item th-fullpage hero-area" style="background-image: url(shops/images/slider/slider-4.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 text-left">
                    <p data-duration-in=".3" data-animation-in="fadeInUp" data-delay-in=".1">PRODUCTS</p>
                    <h1 data-duration-in=".3" data-animation-in="fadeInUp" data-delay-in=".5"> <br>
                        Được ẩn trong chi tiết.</h1>
                    {{-- <a data-duration-in=".3" data-animation-in="fadeInUp" data-delay-in=".8" class="btn"
                        href="shop.html">Shop Now</a> --}}
                </div>
            </div>
        </div>
    </div>
    <div class="slider-item th-fullpage hero-area" style="background-image: url(shops/images/slider/slider-6.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 text-left">
                    <p data-duration-in=".3" data-animation-in="fadeInUp" data-delay-in=".1">133</p>
                    {{-- <h1 data-duration-in=".3" data-animation-in="fadeInUp" data-delay-in=".5">The beauty of nature <br>
                        is hidden in details.</h1>
                    <a data-duration-in=".3" data-animation-in="fadeInUp" data-delay-in=".8" class="btn"
                        href="shop.html">Shop Now</a> --}}
                </div>
            </div>
        </div>
    </div>
</div>

    <section class="product-category section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="title text-center">
                        <h2>Sản Phẩm Mới</h2>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="category-box">
                        <a href="http://127.0.0.1:8000/shop/show/5">
                            <img src="shops/images/shop/category/category-1.jpg" alt="" />
                            <div class="content">
                                <h3>Clothes Sales</h3>
                                <p>Shop New Season Clothing</p>
                            </div>
                        </a>
                    </div>
                    <div class="category-box">
                        <a href="#">
                            <img src="shops/images/shop/category/category-2.jpg" alt="" />
                            <div class="content">
                                <h3>Smart Casuals</h3>
                                <p>Get Wide Range Selection</p>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="category-box category-box-2">
                        <a href='http://127.0.0.1:8000/shop/show/8'>
                            <img src="shops/images/shop/category/category-3.jpg" alt="" />
                            <div class="content">
                                <h3>Jewellery</h3>
                                <p>Special Design Comes First</p>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="products section bg-gray">
        <div class="container">
            <div class="row">
                <div class="title text-center">
                    <h2>Sản Phẩm Hot</h2>
                </div>
            </div>
            <div class="row">
            @foreach ($products as $key => $item)
                <div class="col-md-4">
                    <div class="product-item">
                        <div class="product-thumb">
                            <span style="" class="bage">Sale</span>
                            <img class="img-responsive" src="{{ asset('storage/images/' . $item->image) }}" alt="product-img">
                            <div class="preview-meta">
                                <ul>
                                    <li>
                                    <a href="{{ route('shop.showProduct' , $item->id) }}"><i class="tf-ion-ios-search-strong"></i></a>
                                    </li>
                                    <li>
                                        <a href="#!"><i class="tf-ion-ios-heart"></i></a>
                                    </li>
                                    <li>
                                        <a  href="{{route('shop.store',$item->id)}}" id="{{ $item->id }}"><i class="tf-ion-android-cart"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="product-content">
                            <h4>{{$item->name}}</a></h4>
                            <p> {{number_format($item->price)}}đ</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <video class="video-stream html5-main-video"  autoplay muted loop width="100%" height="500" style="background-color: rgba(0, 0, 0, 0.781)" controls controlslist="nodownload">
        <source  src="{{ asset('assets/video/demoNow.mp4') }}">
     </video>
@endsection
