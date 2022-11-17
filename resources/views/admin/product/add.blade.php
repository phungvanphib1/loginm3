@extends('master')
@section('content')
    <section class="wrapper">
        <div class="panel-panel-default">
            <div class="market-updates">
                <div class="container">
                    <div class="page-inner">
                        <header class="page-title-bar">
                            <nav aria-label="breadcrumb">
                                <a href="{{ route('product.index') }}" class="w3-button w3-red">Quay Lại</a>
                            </nav>
                            <h1 class="page-title">Thêm Sản phẩm</h1>
                        </header>
                        <div class="page-section">
                            <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="card">
                                    <div class="card-body">
                                        <legend>Thông tin cơ bản</legend>
                                        <div class="row">
                                            <div class="row">
                                                <div class="col-lg-4">
                                                    <div class="form-group">
                                                        <label for="tf1">Tên Sản phẩm<abbr
                                                                name="Trường bắt buộc">*</abbr></label>
                                                        <input name="name" type="text" class="form-control"
                                                            value="{{ old('name') }}">
                                                        <small id="" class="form-text text-muted"></small>
                                                        @error('name')
                                                            <div class="text text-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="form-group">
                                                        <label for="tf1"> Số lượng<abbr
                                                                name="Trường bắt buộc">*</abbr></label> <input
                                                            name="amount" type="number" class="form-control"
                                                            value="{{ old('amount') }}">
                                                        <small id="" class="form-text text-muted"></small>
                                                        @error('amount')
                                                            <div class="text text-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="form-group">
                                                        <label for="tf1">Gía<abbr
                                                                name="Trường bắt buộc">*</abbr></label> <input
                                                            name="price" type="number" class="form-control"
                                                            value="{{ old('price') }}">
                                                        <small id="" class="form-text text-muted"></small>
                                                        @error('price')
                                                            <div class="text text-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="tf1">Mô tả<abbr name="Trường bắt buộc">*</abbr></label>
                                                <textarea name="description" class="form-control" value="{{ old('description') }}" id="ckeditor1" rows="4"
                                                    style="resize: none"></textarea>
                                                <small id="" class="form-text text-muted"></small>
                                                @error('description')
                                                    <div class="text text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group col-lg-6">
                                                <label class="control-label" for="flatpickr01">Danh mục<abbr
                                                        name="Trường bắt buộc">*</abbr></label>
                                                <select name="category_id" id="" class="form-control">
                                                    <option value="">--Vui lòng chọn--</option>
                                                    @foreach ($categories as $category)
                                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                    @endforeach
                                                </select>
                                                @if ('category_id')
                                                    <p style="color:red">{{ $errors->first('category_id') }}</p>
                                                @endif
                                            </div>
                                            <div class="form-group has-warning">
                                                <label class="col-lg-3 control-label">image</label>
                                                <div class="col-lg-6">
                                                    <input accept="image/*" type='file' id="inputFile"
                                                        name="image" /><br>
                                                    <br>
                                                    <img type="hidden" width="90px" height="90px" id="blah"
                                                        src="#" alt="" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-actions">
                                            <button class="w3-button w3-blue" type="submit">Thêm Sản Phẩm</button>
                                            <a class="w3-button w3-red" href="{{ route('product.index') }}">Hủy</a>
                                        </div>
                                    </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script type="text/javascript">
        $(document).ready(function() {
            $('.file').change(function(e) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#showImage').attr('src', e.target.result);
                    console.log(e);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });
    </script>
@endsection
