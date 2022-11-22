@extends('shop.masterShop')
@section('contentShop')
    <section class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="content">
                        <h1 class="page-name">Cart</h1>
                        <ol class="breadcrumb">
                            <li><a href="{{ route('shop.index') }}">Home</a></li>
                            <li class="active">cart</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="page-wrapper">
        <div class="cart shopping">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="block">
                            <div class="product-list">

                                <form method="post">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th class="">Sản Phẩm</th>
                                                <th class="">Số Lượng</th>
                                                <th class="">Giá</th>
                                                <th class="">Tổng</th>
                                                <th class="">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $total = 0;
                                                $totalAll = 0;
                                            @endphp
                                            @if (session('cart'))
                                                @foreach (session('cart') as $id => $details)
                                                    @php
                                                        $total = $details['price'] * $details['quantity'];
                                                        $totalAll += $total;
                                                    @endphp
                                                    <tr class="">
                                                        <td class="">
                                                            <div class="product-info">
                                                                <img src="{{ asset('storage/images/' . $details['image']) }}"
                                                                    alt="" style="width:90px; height:90px">
                                                                <a href="#!">{{ $details['nameVi'] ?? '' }}</a>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            {{ $details['quantity'] }}
                                                        </td>
                                                        <td>{{ number_format($details['price']) }}.vnd</td>
                                                        <td class="">{{ number_format($total) }}.vnd</td>
                                                        <td class="">
                                                            <a data-href="{{ route('remove.from.cart', $id) }}"
                                                                class="btn btn-danger btn-sm fa fa-window-close"
                                                                id="{{ $id }}">Xóa</a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @else
                                                <tr>
                                                    <td>
                                                        Giỏ hàng của bạn chưa có sản phẩm nào?
                                                    </td>
                                                </tr>
                                            @endif
                                        </tbody>
                                    </table>
                                    @if (session('cart'))
                                        <a href="{{ route('checkOuts') }}" class="btn btn-main pull-right">Checkout</a>
                                    @endif


                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $(".changeQuantity").click(function(e) {
            e.preventDefault();
            var id = $(this).data('id');
            var quantity = $(this).parents("tr").find("input.quantity").val();
            $.ajax({
                url: '{{ route('update.cart') }}',
                method: "patch",
                data: {
                    _token: '{{ csrf_token() }}',
                    id: id,
                    quantity: quantity,
                },
                success: function(response) {
                    // window.location.reload();
                    $('.total_cart-' + id).html(response.totalCart);
                    $('.TotalAllAjaxCall').html(response.TotalAllRefreshAjax);
                    alertify.set('notifier', 'position', 'top-right');
                    alertify.success(response.status);
                }
            });
        });
        $(document).on('click', '.fa-window-close', function(e) {
            e.preventDefault();
            let id = $(this).attr('id');
            let href = $(this).data('href');
            let csrf = '{{ csrf_token() }}';
            window.location.reload();
            $.ajax({
                url: href,
                method: 'delete',
                data: {
                    _token: csrf
                },
                success: function(response) {
                    $('.item-' + id).remove();
                    alertify.set('notifier', 'position', 'top-right');
                    alertify.success(response.status);
                }
            });
        });
    });
    $('.btn-plus, .btn-minus').on('click', function(e) {
        const isNegative = $(e.target).closest('.btn-minus').is('.btn-minus');
        const input = $(e.target).closest('.input-group').find('input');
        if (input.is('input')) {
            input[0][isNegative ? 'stepDown' : 'stepUp']()
        }
    })
</script>
