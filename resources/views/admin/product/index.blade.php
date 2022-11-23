@extends('master')
@section('content')
<section class="wrapper">
    <div class="table-agile-info">
        <div class="panel-panel-default">
                <header class="page-title-bar">
                    <h1 class="page-title">Sản phẩm</h1>
                    @if (Auth::user()->hasPermission('Product_create'))
                    <a href="{{ route('product.create') }}" class="w3-button w3-red">Thêm Sản Phẩm</a>
                    <a href="{{ route('products.exportExcel') }}" class="w3-button w3-red">Xuất file excel</a>
                    @endif
                </header>
                <hr>
                <div class="panel-heading">
                    products Management
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

                        <thead>
                            <tr>
                                <th data-breakpoints="xs">Stt</th>
                                {{-- <th data-breakpoints="xs">ID</th> --}}
                                <th>Tên Sản Phẩm</th>
                                <th>Thể loại</th>
                                <th>Số Lượng</th>
                                <th>Hiển Thị</th>
                                <th data-breakpoints="xs">Tùy Chỉnh</th>
                            </tr>
                        </thead>
                        <tbody id="myTable">
                            @foreach ($products as $key => $product)
                                <tr data-expanded="true" class="item-{{ $product->id }}">
                                    <td>{{  ++$key }}</td>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->categories->name}}</td>
                                    <td>{{ $product->amount }}</td>
                                   <td>
                                    <a href="{{ route('product.show', $product->id) }}">

                                    <img src="{{ asset('storage/images/' . $product->image) }}" alt="" width='100px' height="120px"></a></td>
                                    <td>
                                            <form action="{{ route('product.softdeletes', $product->id) }}" method="POST">
                                                @if (Auth::user()->hasPermission('Product_view'))
                                                <a class="w3-button w3-white" href="{{ route('product.show', $product->id) }}">Xem</a>
                                                @endif
                                                @if (Auth::user()->hasPermission('Product_update'))
                                                <a href="{{ route('product.edit', $product->id) }}"
                                                    class="w3-button w3-blue">Sửa</a>
                                                @endif
                                                @csrf
                                                @method('PUT')
                                                @if (Auth::user()->hasPermission('Product_delete'))
                                                <button type="submit" class="w3-button w3-red"
                                                    onclick="return confirm('Chuyên vào thùng rác')">Xóa</button>
                                                @endif
                                                @if (Session::has('success'))
                                                    <p class="text-success">
                                                    <div class="alert alert-success"> <i class="fa fa-check"
                                                            aria-hidden="true"></i>
                                                        {{ Session::get('success') }}</div>
                                                    </p>
                                                @endif
                                                @if (Session::has('error'))
                                                    <p class="text-danger">
                                                    <div class="alert alert-danger"> <i
                                                            class="bi bi-x-circle"aria-hidden="true"></i>
                                                        {{ Session::get('error') }}</div>
                                                    </p>
                                                @endif
                                            </form>
                                        {{-- <a data-href="{{ route('product.destroy', $product->id) }}"
                                            id="{{ $product->id }}" class="w3-button w3-red sm deleteIcon">Xóa</i></a> --}}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $products->appends(request()->query()) }}
                </div>
            </div>
        </div>
    </section>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.2/js/bootstrap.bundle.min.js'></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.10.25/datatables.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).on('click', '.deleteIcon', function(e) {
            e.preventDefault();
            let id = $(this).attr('id');
            let href = $(this).data('href');
            let csrf = '{{ csrf_token() }}';
            console.log(id);
            Swal.fire({
                title: 'Bạn có chắc không?',
                text: "Bạn sẽ không thể hoàn nguyên điều này!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Có, xóa!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: href,
                        method: 'delete',
                        data: {
                            _token: csrf
                        },
                        success: function(res) {
                            Swal.fire(
                                'Deleted!',
                                'Tệp của bạn đã bị xóa!',
                                'success'
                            )
                            $('.item-' + id).remove();
                        }
                    });
                }
            })
        });
    </script>
@endsection
