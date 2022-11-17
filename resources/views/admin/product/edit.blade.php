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
                            <h1 class="page-title">Chỉnh sửa Sản phẩm</h1>
                        </header>

                        <div class="page-section">
                            <form action="{{ route('product.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                                @method('PUT')
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
                                                            value="{{ $product->name }}">
                                                        <small id="" class="form-text text-muted"></small>
                                                        @error('name')
                                                            <div class="text text-danger">{{ $message }}</div>
                                                        @enderror
                                                        {{-- @if ($errors->any())
                                                            <p style="color:red">{{ $errors->first('name') }}</p>
                                                        @endif --}}
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="form-group">
                                                        <label for="tf1"> Số lượng<abbr
                                                                name="Trường bắt buộc">*</abbr></label> <input
                                                            name="amount" type="number" class="form-control"
                                                            value="{{ $product->amount }}">
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
                                                            value="{{ $product->price }}">
                                                        <small id="" class="form-text text-muted"></small>
                                                        @error('price')
                                                            <div class="text text-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="form-group">
                                                <label for="tf1">Mô tả<abbr name="Trường bắt buộc">*</abbr></label>
                                                <textarea name="description" class="form-control" id="ckeditor1" rows="4" style="resize: none">{!! $product->description !!}</textarea>
                                                <small id="" class="form-text text-muted"></small>
                                                @error('description')
                                                    <div class="text text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>


                                            <div class="form-group col-lg-6">
                                                <label class="control-label" for="flatpickr01">Danh mục<abbr
                                                        name="Trường bắt buộc">*</abbr></label>
                                                <select name="category_id" id="" class="form-control">
                                                    {{-- <option value="">--Vui lòng chọn--</option> --}}
                                                    @foreach ($categories as $category)
                                                        <option
                                                            <?= $category->id == $product->category_id ? 'selected' : '' ?>
                                                            value="{{ $category->id }}">
                                                            {{ $category->name }}</option>
                                                    @endforeach
                                                </select>
                                                @if ('category_id')
                                                    <p style="color:red">{{ $errors->first('category_id') }}</p>
                                                @endif
                                            </div>
                                            <div class="form-group col-lg-6">
                                                <label class="control-label" for="flatpickr01">Hìnhh Ảnh</label><br>
                                                <input accept="image/*" type='file' id="inputFile" name="image" /><br>
                                                <br>
                                                <img type="hidden" width="90px" height="90px" id="blah1"
                                                    src="{{ asset('storage/images/' . $product->image) ?? asset('storage/images/' . $request->image) }}"
                                                    alt="" />
                                                @if ('image')
                                                    <p style="color:red">{{ $errors->first('image') }}</p>
                                                @endif
                                            </div>



                                        </div>
                                        <div class="form-actions">
                                            <button class="w3-button w3-blue" type="submit">Chỉnh sửa</button>
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
