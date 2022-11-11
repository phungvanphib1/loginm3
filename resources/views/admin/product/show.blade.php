@extends('master')
@section('content')
<section class="wrapper">

    <h1>id {{$productshow->id}}</h1>
    <h1>Tên sản phẩm {{$productshow->name}}</h1>
    <h1>Giá {{$productshow->price}}</h1>
    <h1>Số lượng {{$productshow->amount}}</h1>
    <h1>Mô tả {{$productshow->description}}</h1>
    <h1>thể loại {{$productshow->categories->name}}</h1>

</section>
@endsection
