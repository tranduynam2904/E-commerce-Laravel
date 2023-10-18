@extends('client.layout.master')
@section('main')
    <nav aria-label="breadcrumb" class="w-100 float-left">
        <ol class="breadcrumb parallax justify-content-center" data-source-url="img/banner/parallax.jpg"
            style="background-image: url(&quot;img/banner/parallax.jpg&quot;); background-position: 50% 0.809717%;">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">cart</li>

        </ol>
    </nav>
    <div class="cart-area table-area pt-110 pb-95 float-left w-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12 col-sm-12 float-left cart-wrapper">
                    <div class="table-responsive">
                        <table class="table product-table text-center">
                            <thead>
                                <tr>
                                    <th class="table-remove text-capitalize">remove</th>
                                    <th class="table-image text-capitalize">image</th>
                                    <th class="table-p-name text-capitalize">product</th>
                                    <th class="table-p-price text-capitalize">price</th>
                                    <th class="table-p-qty text-capitalize">quantity</th>
                                    <th class="table-total text-capitalize">total</th>
                                </tr>
                            </thead>

                            <tbody id="table-cart">
                                @php $total = 0 @endphp
                                {{-- Foreach will prevent to value change when reload page --}}
                                @foreach ($cart as $productId => $item)
                                    @php $total += $item['qty'] * $item['price'] @endphp
                                    <tr id="{{ $productId }}">
                                        <td class="table-remove">
                                            <button style="cursor: pointer;" data-id="{{ $productId }}"
                                                data-url="{{ route('product.delete-item-in-cart', ['productId' => $productId]) }}"
                                                class="icon_close"><i class="material-icons">delete</i>
                                            </button>
                                        </td>
                                        <td class="table-image"><a href="product-details.html"><img
                                                    src="{{ $item['image'] }}" alt=""></a></td>
                                        <td class="table-p-name text-capitalize"><a
                                                href="product-details.html">{{ $item['name'] }}</a></td>
                                        <td class="table-p-price">
                                            <p>${{ number_format($item['price'], 2) }}</p>
                                        </td>
                                        <td style="display:flex" data-price="{{ $item['price'] }}"
                                            data-url="{{ route('product.update-item-in-cart', ['productId' => $productId]) }}"
                                            data-id="{{ $productId }}" class="table-p-qty">
                                            <span class="btn-primary inc qtybtn">+</span>
                                            <input style="margin: 0" class="qty-input" value="{{ $item['qty'] }}"
                                                type="text">
                                            <span class="btn-primary dec qtybtn">-</span>
                                        </td>
                                        <td class="table-p-total">
                                            <p id="total-price-product" style="margin-top:1rem">
                                                ${{ number_format($item['qty'] * $item['price'], 2) }}</p>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="table-bottom-wrapper">
                        <div
                            class="table-coupon d-flex d-xs-block d-lg-flex d-sm-flex fix justify-content-start float-left">
                            <input type="text" placeholder="Coupon code">
                            <button type="submit" class="btn-primary btn">Apply coupon</button>
                        </div>
                        <div class="table-update d-flex d-xs-block d-lg-flex d-sm-flex justify-content-end">
                            <a data-url="{{ route('product.delete-all-in-cart') }}"
                                class="btn-primary btn delete-cart">Delete cart</a>
                        </div>
                    </div>
                </div>
                <div
                    class="table-total-wrapper d-flex justify-content-end pt-60 col-md-12 col-sm-12 col-lg-4 float-left align-items-center">
                    <div class="table-total-content">
                        <h2 class="pb-20">Cart totals</h2>
                        <div class="table-total-amount">
                            <div class="single-total-content d-flex justify-content-between float-left w-100">
                                @php
                                    $total_qty = 0;
                                    $cart = session()->get('cart', []);
                                    foreach ($cart as $item) {
                                        $total_qty += $item['qty'];
                                    }
                                @endphp
                                <strong>Total item</strong>
                                <span id="total-items-qty">
                                    {{ $total_qty }}
                                </span>
                            </div>
                            <div class="single-total-content d-flex justify-content-between float-left w-100">
                                <strong>Shipping</strong>
                                <span class="c-total-price"><span>Flat Rate:</span> $5.00</span>
                            </div>
                            <div class="single-total-content d-flex justify-content-end float-left w-100">
                                <a href="#">Calculate shipping</a>
                            </div>
                            <div class="single-total-content tt-total d-flex justify-content-between float-left w-100">
                                <strong>Sub Total</strong>
                                <span id="cart-subtotal" class="c-total-price">${{ number_format($total, 2) }}</span>
                            </div>
                            <div class="single-total-content tt-total d-flex justify-content-between float-left w-100">
                                <strong>Total</strong>
                                @php
                                    $shipFee = $total * 0.05;
                                    $totalAfterFee = $total + $shipFee;
                                @endphp
                                <span id ="cart-total" class="c-total-price">
                                    ${{ number_format($totalAfterFee, 2) }}
                                </span>
                            </div>
                            <a href="{{ route('checkout') }}" class="btn btn-primary float-left w-100 text-center">Proceed
                                to
                                checkout</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
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

            $('.qtybtn').on('click', function() {

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

                var totalPrice = price * qty;
                var shipFee = totalPrice * 0.05
                var totalAfterFee = totalPrice - shipFee;
                url += '/' + qty;

                $.ajax({
                    method: 'GET',
                    url: url,
                    success: function(response) {
                        // Swal.fire({
                        //     icon: 'success',
                        //     text: response.message,
                        // });
                        if (qty === 0) {
                            $('tr#' + id).empty();
                        }
                        $('tr#' + id)
                            .find('#total-price-product')
                            .html("$" + totalPrice.toFixed(2).replace(
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
                var shipFee = response.total_price * 0.05
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
