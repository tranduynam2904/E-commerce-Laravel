@extends('client.layout.master')
@section('main')
    <!-- Begin Li's Breadcrumb Area -->
    <div class="breadcrumb-area">
        <div class="container">
            <div class="breadcrumb-content">
                <ul>
                    <li><a href="index.html">Home</a></li>
                    <li class="active">Checkout</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Li's Breadcrumb Area End Here -->
    <!--Checkout Area Strat-->
    <div class="checkout-area pt-60 pb-30">
        <div class="container">
            <form method="POST" action="{{ route('place-order') }}">
                @csrf
                <div class="row">
                    <div class="col-12">
                        <div class="coupon-accordion">
                            <!--Accordion Start-->
                            <h3>Have a coupon? <span id="showcoupon">Click here to enter your code</span></h3>
                            <div id="checkout_coupon" class="coupon-checkout-content">
                                <div class="coupon-info">

                                        <p class="checkout-coupon">
                                            <input placeholder="Coupon code" type="text">
                                            <input value="Apply Coupon" type="submit">
                                        </p>

                                </div>
                            </div>
                            <!--Accordion End-->
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-12">
                        <div class="checkbox-form">
                            <h3>Billing Details</h3>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="checkout-form-list">
                                        <label>Name <span class="required">*</span></label>
                                        <input value="{{ Auth::user()->name }}" name="name" placeholder=""
                                            type="text">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="checkout-form-list">
                                        <label>Address <span class="required">*</span></label>
                                        <input name="address" placeholder="Street address" type="text">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="checkout-form-list">
                                        <label>Email Address <span class="required">*</span></label>
                                        <input readonly value="{{ Auth::user()->email }}" name="email" placeholder=""
                                            type="email">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="checkout-form-list">
                                        <label>Phone <span class="required">*</span></label>
                                        <input oninput="validatePhone(this)" name="phone"
                                            value="{{ Auth::user()->phone }}" type="text">
                                    </div>
                                    <script>
                                        function validatePhone(input) {
                                            // Get value Input
                                            var otp = input.value;

                                            // Remove non-numeric characters
                                            otp = otp.replace(/\D/g, '');

                                            // Limit 6 numbers
                                            otp = otp.slice(0, 10);

                                            // Assign the parameter value
                                            input.value = otp;
                                        }
                                    </script>
                                </div>
                                <div class="col-md-12">
                                    <div class="checkout-form-list">
                                        <label>Note</label>
                                        <input name="note" type="text">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-12">
                        <div class="your-order">
                            <h3>Your order</h3>
                            <div class="your-order-table table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th class="cart-product-name">Product</th>
                                            <th class="cart-product-total">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $total = 0 @endphp
                                        @foreach ($cart as $productId => $item)
                                            @php
                                                if ($item['discount_price'] > 0) {
                                                    $total += $item['qty'] * $item['discount_price'];
                                                }
                                                else {
                                                    $total += $item['qty'] * $item['price'];
                                                }
                                            @endphp
                                        @endforeach
                                        @php
                                            $total_qty = 0;
                                            $cart = session()->get('cart', []);
                                            foreach ($cart as $item) {
                                                $total_qty += $item['qty'];
                                            }
                                        @endphp
                                        <tr class="cart_item">
                                            <td class="cart-product-name"> {{ $item['name'] }}<strong
                                                    class="product-quantity"> × {{ $item['qty'] }}</strong></td>

                                            @if ($item['discount_price'] > 0)
                                                <td class="cart-product-total"><span
                                                        class="amount">{{ $item['discount_price'] }}</span></td>
                                            @else
                                                <td class="cart-product-total"><span
                                                        class="amount">{{ $item['price'] }}</span></td>
                                            @endif
                                        </tr>

                                    </tbody>
                                    <tfoot>
                                        <tr class="cart-subtotal">
                                            <th>Total item</th>
                                            <td><span class="amount">{{ $total_qty }}</span></td>
                                        </tr>
                                        <tr class="cart-subtotal">
                                            <th>Shipping</th>
                                            <td><span class="amount">3%</span></td>
                                        </tr>
                                        <tr class="cart-subtotal">
                                            <th>Cart Subtotal</th>
                                            <td><span class="amount">${{ number_format($total, 2) }}</span></td>
                                        </tr>
                                        <tr class="order-total">
                                            @php
                                                $shipFee = $total * 0.03;
                                                $totalAfterFee = $total + $shipFee;
                                            @endphp
                                            <th>Order Total</th>
                                            <td><strong><span
                                                        class="amount">${{ number_format($totalAfterFee, 2) }}</span></strong>
                                            </td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <div class="payment-method">
                                <div class="payment-accordion">
                                    <div id="accordion">
                                        <div class="card">
                                            <div class="card-header" id="#payment-3">
                                                <div class="list-group-item  justify-content-between">
                                                    <div class="custom-control custom-radio" id="checkbox-card-paypal">
                                                        <input name="payment_method" value="vnpay" id="paypal"
                                                            type="radio" class="custom-control-input" required="">
                                                        <label class="custom-control-label" for="paypal">Vnpay</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="order-button-payment">
                                        <input value="Place order" type="submit">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!--Checkout Area End-->
@endsection
