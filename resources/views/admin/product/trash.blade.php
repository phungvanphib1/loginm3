@extends('master')
@section('content')
    <section class="wrapper">
        <div class="table-agile-info">
            <div class="panel-panel-default">
                <header class="page-title-bar">
                    <h1 class="page-title">Sản Phẩm</h1>
                    <nav aria-label="breadcrumb">
                        <a href="{{ route('product.index') }}" class="w3-button w3-red">Trang chủ</a>
                    </nav>
                </header>
                <hr>
                <div class="panel-heading">
                    Kho lưu sản phẩm
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
                                <th data-breakpoints="xs">id</th>
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
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $product->id }}</td>
                                    <td>{{ $product->name }}</td>
                                    <td> {{ $product->categories->name}} </td>
                                    <td> {{ $product->amount}} </td>
                                    <td><img src="{{ asset('storage/images/' . $product->image) }}" alt="" width='100px' height="120px"></td>
                                    <td>
                                        <form action="{{ route('product.restoredelete', $product->id) }}" method="POST">
                                            @csrf
                                            @method('put')
                                            @if (Auth::user()->hasPermission('Product_restore'))
                                                <button type="submit" class="w3-button w3-blue">Khôi Phục</button>
                                            @endif
                                            @if (Auth::user()->hasPermission('Product_forceDelete'))
                                                <a data-href="{{ route('product.destroy', $product->id) }}"
                                                    id="{{ $product->id }}" class="w3-button w3-red sm deleteIcon">Xóa</a>
                                            @endif
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $products->appends(request()->query()) }}
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
                        },
                    });
                    Swal.fire({
                    icon: 'error',
                    title: 'lỗi rồi...',
                    text: 'Đã xảy ra lỗi!',
                    // footer: '<a href="">Why do I have this issue?</a>'
                    })
                }

            })
        });
    </script>
@endsection
