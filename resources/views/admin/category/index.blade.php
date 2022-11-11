@extends('master')
@section('content')
    <section class="wrapper">
        <div class="table-agile-info">
            <div class="panel-panel-default">
                <header class="page-title-bar">
                    <h1 class="page-title">Thể Loại</h1>
                    <nav aria-label="breadcrumb">
                        <a href="{{ route('category.create') }}" class="w3-button w3-red">Thêm Thể Loại</a>
                    </nav>
                </header>
                <hr>
                <div class="panel-heading">
                    Danh Sách Thể Loại
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
                                <th>STT</th>
                                <th data-breakpoints="xs">ID</th>
                                <th>Tên</th>
                                <th>Sản Phẩm</th>
                                <th data-breakpoints="xs">Tùy Chỉnh</th>
                            </tr>
                        </thead>
                        <tbody id="myTable">
                            @foreach ($categories as $key => $category)
                                <tr data-expanded="true" class="item-{{ $category->id }}">
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $category->id }}</td>
                                    <td>{{ $category->name }}</td>
                                    <td>{{  count($category->products) }}</td>
                                    <td>
                                        {{-- <a data-href="{{ route('category.destroy', $category->id) }}" id="{{ $category->id }}" class="w3-button w3-red sm deleteIcon">Xóa</a> --}}

                                        <form action="{{route('category.softdeletes', $category->id)}}" method="POST">
                                            <a href="{{ route('category.edit', $category->id) }}" class="w3-button w3-blue">Sửa</a>
                                            @csrf
                                            @method('PUT')
                                            <button type="submit" class="w3-button w3-red" onclick="return confirm('Chuyên vào thùng rác')"  >Xóa</button>
                                            @if (Session::has('success'))
                                            <p class="text-success">
                                            <div class="alert alert-success"> <i class="fa fa-check" aria-hidden="true"></i>
                                                {{ Session::get('success') }}</div>
                                            </p>
                                            @endif
                                            @if (Session::has('error'))
                                            <p class="text-danger">
                                            <div class="alert alert-danger"> <i class="bi bi-x-circle"aria-hidden="true"></i>
                                                {{ Session::get('error') }}</div>
                                            </p>
                                            @endif
                                        </form>

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $categories->appends(request()->query()) }}
            </div>
        </div>
    </section>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.2/js/bootstrap.bundle.min.js'></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.10.25/datatables.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        $(document).on('click', '.deleteIcon', function(e) {
            // e.preventDefault();
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
