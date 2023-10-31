@extends('client.layout.master')
@section('main')
    <!-- Begin Li's Breadcrumb Area -->
    <div class="breadcrumb-area">
        <div class="container">
            <div class="breadcrumb-content">
                <ul>
                    <li><a href="index.html">Home</a></li>
                    <li class="active">Shopping Cart</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Li's Breadcrumb Area End Here -->
    <!--Shopping Cart Area Strat-->
    <div class="Shopping-cart-area pt-60 pb-60">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <form action="#">
                        <div class="table-content table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="li-product-remove">remove</th>
                                        <th class="li-product-thumbnail">images</th>
                                        <th class="cart-product-name">Product</th>
                                        <th class="li-product-price">Unit Price</th>
                                        <th class="li-product-quantity">Quantity</th>
                                        <th class="li-product-subtotal">Total</th>
                                    </tr>
                                </thead>
                                <tbody id="table-cart">
                                    @php $total = 0 @endphp
                                    {{-- Foreach will prevent to value change when reload page --}}
                                    @foreach ($cart as $productId => $item)
                                        @php
                                            if ($item['discount_price'] > 0) {
                                                $total += $item['qty'] * $item['discount_price'];
                                            } else {
                                                $total += $item['qty'] * $item['price'];
                                            }
                                        @endphp
                                        <tr id="{{ $productId }}">
                                            <td class="li-product-remove"><a data-id="{{ $productId }}"
                                                    data-url="{{ route('product.delete-item-in-cart', ['productId' => $productId]) }}"
                                                    class="icon_close"><i class="fa fa-times"></i></a></td>
                                            <td class="li-product-thumbnail"><a href="#"><img
                                                        src="{{ $item['image'] }}"></a></td>
                                            <td class="li-product-name"><a href="#">{{ $item['name'] }}</a></td>

                                            <td class="li-product-price">
                                                @if ($item['discount_price'] > 0)
                                                    <span
                                                        class="amount">${{ number_format($item['discount_price'], 2) }}</span>
                                                @else
                                                    <span class="amount">${{ number_format($item['price'], 2) }}</span>
                                                @endif
                                            </td>
                                            <td class="quantity">
                                                <label>Quantity</label>
                                                <div class="cart-plus-minus"
                                                data-price="{{ $item['price'] }}"
                                                data-discount-price="{{ $item['discount_price'] }}"
                                                    data-url="{{ route('product.update-item-in-cart', ['productId' => $productId]) }}"
                                                    data-id="{{ $productId }}">
                                                    <input class="cart-plus-minus-box qty-input"
                                                        value="{{ $item['qty'] }}" type="text">
                                                    <div class="inc qtybutton"><i class="fa fa-angle-up"></i></div>
                                                    <div class="dec qtybutton"><i class="fa fa-angle-down"></i></div>
                                                </div>
                                            </td>
                                            <td class="product-subtotal">
                                                @if ($item['discount_price'] > 0)
                                                    <span
                                                        class="total-price-product">${{ number_format($item['qty'] * $item['discount_price'], 2) }}</span>
                                                @else
                                                    <span
                                                    class="total-price-product">${{ number_format($item['qty'] * $item['price'], 2) }}</span>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="coupon-all">
                                    <div class="coupon">
                                        <input id="coupon_code" class="input-text" name="coupon_code" value=""
                                            placeholder="Coupon code" type="text">
                                        <input class="button" name="apply_coupon" value="Apply coupon" type="submit">
                                    </div>
                                    <div class="coupon2">
                                        <input data-url="{{ route('product.delete-all-in-cart') }}"
                                            class="button delete-cart" name="update_cart" value="Delete cart"
                                            type="submit">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-5 ml-auto">
                                <div class="cart-page-total">
                                    <h2>Cart totals</h2>
                                    <ul>
                                        @php
                                            $shipFee = $total * 0.03;
                                            $totalAfterFee = $total + $shipFee;
                                            $total_qty = 0;
                                            $cart = session()->get('cart', []);
                                            foreach ($cart as $item) {
                                                $total_qty += $item['qty'];
                                            }
                                        @endphp
                                        <li>Total item<span id="total-items-qty">{{ $total_qty }}</span></li>
                                        <li>Shipping<span>3%</span></li>
                                        <li>Subtotal<span id="cart-subtotal">${{ number_format($total, 2) }}</span></li>
                                        <li>Total<span id="cart-total">
                                            ${{ $totalAfterFee }}
                                        </span></li>
                                    </ul>
                                    <a href="{{ route('checkout') }}">Proceed to checkout</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--Shopping Cart Area End-->
@endsection
@section('js-custom')
    <script>
        $(document).ready(function() {
            $('.icon_close').on('click', function() {
                var url = $(this).data('url');
                var id = $(this).data('id');
                $.ajax({
                    method: 'get',
                    url: url,
                    data: {
                        'name': '1'
                    },
                    success: function(response) {
                        Swal.fire({
                            icon: 'success',
                            text: response.message,
                        });
                        $('tr#' + id).empty();
                    }
                });
            });

            $('.qtybutton').on('click', function() {

                var button = $(this);
                var id = button.parent().data('id');
                var $input = button.siblings('.qty-input');
                var qty = parseInt($input.val());
                var url = $(this).parent().data('url');
                if (button.hasClass('inc')) {
                    qty += 1;
                } else {
                    qty = (qty < 0) ? 0 : (qty -= 1);
                }
                //Call Back Input
                $input.val(qty);
                var price = parseFloat(button.parent().data('price'));
                var discount_price = parseFloat(button.parent().data('discount-price'));
                var totalPrice = 0;
                if(discount_price >0){
                    totalPrice = discount_price * qty;
                }

                    totalPrice = price * qty;

                // var totalPrice = price * qty;
                // var shipFee = totalPrice * 0.03;
                // var totalAfterFee = totalPrice - shipFee;
                url += '/' + qty;
                $.ajax({
                    method: 'GET',
                    url: url,
                    success: function(response) {
                        // console.log(response);
                        // Swal.fire({
                        //     icon: 'success',
                        //     text: response.message,
                        // });
                        if (qty === 0) {
                            $('tr#' + id).empty();
                        }
                        $('tr#' + id + ' .total-price-product').html("$" + totalPrice.toFixed(2).replace(
                                /(\d)(?=(\d\d\d)+(?!\d))/g, "$1,"));
                        reloadView(response);

                    }
                });
            });

            $('.delete-cart').on('click', function(event) {
                event.preventDefault();
                var url = $(this).data('url');
                $.ajax({
                    method: 'get',
                    url: url,
                    success: function(response) {
                        Swal.fire({
                            icon: 'success',
                            text: response.message,
                        });
                        reloadView(response);
                        $('#table-cart').empty();
                    }
                });
            });
            // Value will change when change value, don't need to reload page
            function reloadView(response) {
                var shipFee = response.total_price * 0.03
                // console.log(response.total_items);
                $('#total-items-qty').html(response.total_qty);
                $('#total-items-cart').html(response.total_items);
                $('#total-price-cart').html('$' + response.total_price.toFixed(2)
                    .replace(
                        /(\d)(?=(\d\d\d)+(?!\d))/g, "$1,"));

                $('#cart-subtotal').html('$' + response.total_price.toFixed(
                    2).replace(
                    /(\d)(?=(\d\d\d)+(?!\d))/g, "$1,"));
                var cartTotal = response.total_price + shipFee;
                $('#cart-total').html('$' + cartTotal.toFixed(
                    2).replace(
                    /(\d)(?=(\d\d\d)+(?!\d))/g, "$1,"));
            }
        });
    </script>
@endsection
