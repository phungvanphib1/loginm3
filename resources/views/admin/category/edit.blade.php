@extends('master')
@section('content')
    <section class="wrapper">
        <div class="panel-panel-default">
            <div class="market-updates">
                <div class="container">
                    <div class="page-inner">
                        <header class="page-title-bar">
                            <nav aria-label="breadcrumb">
                                {{-- <a href="{{ route('product.index') }}" class="w3-button w3-red">Quay Lại</a> --}}
                            </nav>
                            <h1 class="page-title">Chỉnh Sửa Thể Loại</h1>
                        </header>
                        <hr>
                        <div class="panel-body">
                            <form role="form" class="form-horizontal "
                                action="{{ route('category.update', $category->id) }}" method="POST">
                                @method('PUT')
                                @csrf
                                <div class="form-group has-warning">
                                    <label class="col-lg-2">Tên Thể Loại</label>
                                    <div class="col-lg-8">
                                        <input type="text" value="{{ $category->name }}" name="name" placeholder=""
                                            class=" @error('name') is-invalid @enderror form-control ">
                                        @error('name')
                                            <div class="text text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <br><br>
                                <div class="form-group">
                                    <div class="col-lg-offset-2 col-lg-6">
                                        <button class="w3-button w3-blue" type="submit">Chỉnh sửa thể Loại</button>
                                        <a href="{{ route('category.index') }}" class="w3-button w3-red"
                                            type="submit">Hủy</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
    </section>
@endsection
