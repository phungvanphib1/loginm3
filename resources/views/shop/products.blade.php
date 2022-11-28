@extends('shop.masterShop')
@section('contentShop')

    <section class="products section bg-gray">
        <div class="container">
            <div class="row">
                <div class="title text-center">
                    <h2>Sản Phẩm</h2>
                    {{-- {!!$categories!!} --}}

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
                <br>
                @endforeach
            </div>
        </div>
    </section>
    {{-- @foreach ( $categories as $cate)
                        {{$cate->name}} <br>
    @endforeach --}}
    <video class="video-stream html5-main-video"  autoplay muted loop width="100%" height="500" style="background-color: rgba(0, 0, 0, 0.781)" controls controlslist="nodownload">
        <source  src="{{ asset('assets/video/demoNow.mp4') }}">
     </video>
@endsection
