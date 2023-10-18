@extends('client.layout.master')
@section('main')
    <nav aria-label="breadcrumb" class="w-100 float-left">
        <ol class="breadcrumb parallax justify-content-center" data-source-url="img/banner/parallax.jpg"
            style="background-image: url(&quot;img/banner/parallax.jpg&quot;); background-position: 50% 0.809717%;">
            <li class="breadcrumb-item active"><a href="#">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">checkout</li>

        </ol>
    </nav>
    <div class="checkout-inner float-left w-100">
        <div class="container">
            <form method="POST" action="{{ route('place-order') }}">
                @csrf
                <div class="row">
                    <div class="cart-block-left col-md-4 order-md-2 mb-4">
                        <h4 class="d-flex justify-content-between align-items-center mb-3">
                            <span>Your cart</span>
                        </h4>
                        <div class="list-group mb-3">
                            <div class="list-group-item d-flex justify-content-between lh-condensed">
                                @php $total = 0 @endphp
                                @foreach ($cart as $item)
                                    @php $total += $item['price'] * $item['qty'] @endphp
                                @endforeach
                                @php
                                    $total_qty = 0;
                                    $cart = session()->get('cart', []);
                                    foreach ($cart as $item) {
                                        $total_qty += $item['qty'];
                                    }
                                @endphp
                                {{-- @php $total += $item['price'] * $item['qty'] @endphp --}}
                                <div>
                                    <h6 class="my-0">Total item</h6>
                                </div>
                                <span class="text-muted"> {{ $total_qty }}</span>
                            </div>
                            <div class="list-group-item d-flex justify-content-between lh-condensed">
                                <div>
                                    <h6 class="my-0">Shipping</h6>
                                </div>
                                <span class="text-muted">5%</span>
                            </div>
                            <div class="list-group-item d-flex justify-content-between">
                                <div class="text-success">
                                    <h6 class="my-0">Sub Total</h6>
                                    <small></small>
                                </div>
                                <span class="text-success">${{ number_format($total, 2) }}</span>
                            </div>
                            <div class="list-group-item d-flex justify-content-between">
                                @php
                                    $shipFee = $total * 0.05;
                                    $totalAfterFee = $total + $shipFee;
                                @endphp
                                <strong>Total</strong>
                                <strong>${{ number_format($totalAfterFee, 2) }}</strong>
                            </div>
                            <div class="list-group-item  justify-content-between">
                                <div class="custom-control custom-radio" id="checkbox-card-paypal">
                                    <input name="payment_method" value="vnpay" id="paypal" type="radio"
                                        class="custom-control-input" required="">
                                    <label class="custom-control-label" for="paypal">Vnpay</label>
                                </div>
                            </div>
                            {{-- <a href="order-confirmation.html" class="btn btn-primary btn-lg btn-primary">Place an order</a> --}}
                            <button type="submit" class="btn btn-primary btn-lg btn-primary">Place an order</button>
                            </ul>
                        </div>

                    </div>

                    <div class="cart-block-right col-md-8 order-md-1">
                        <div class="col-lg-12 col-md-12 col-sm-12 float-left cart-wrapper">
                            <div style="::-webkit-scrollbar; height:300px" class="table-responsive">
                                <table class="table product-table text-center">
                                    <thead>
                                        <tr>
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
                                                <td class="table-image"><a href="product-details.html"><img
                                                            style="width:120px ;max-width: 100%" src="{{ $item['image'] }}"
                                                            alt=""></a></td>
                                                <td class="table-p-name text-capitalize"><a
                                                        href="product-details.html">{{ $item['name'] }}</a></td>
                                                <td class="table-p-price">
                                                    <p style="margin-top: 1rem">${{ number_format($item['price'], 2) }}</p>
                                                </td>
                                                <td data-price="{{ $item['price'] }}"
                                                    data-url="{{ route('product.update-item-in-cart', ['productId' => $productId]) }}"
                                                    data-id="{{ $productId }}" class="table-p-qty">
                                                    {{-- <span class="btn-primary inc qtybtn">+</span> --}}
                                                    <input readonly
                                                        style="width: 40px; text-align:center ;outline-style:none"
                                                        class="qty-input" value="{{ $item['qty'] }}" type="text">
                                                    {{-- <span class="btn-primary dec qtybtn">-</span> --}}
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
                        </div>
                        <h4 class="mb-3">Billing address</h4>

                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label for="name">Name <span class="required">*</span></label>
                                <input name="name" type="text" class="form-control" id="name"
                                    placeholder="Your Name" value="{{ Auth::user()->name }}" required="">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="email">Email <span class="required">*</span></label>
                            <input value="{{ Auth::user()->email }}" name="email" type="email" class="form-control"
                                id="email" placeholder="you@example.com">
                        </div>

                        <div class="mb-3">
                            <label for="phone">Phone <span class="required">*</span></label>
                            <input oninput="validatePhone(this)" value="{{ Auth::user()->phone }}" name="phone" type="text" class="form-control"
                                id="email">
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
                        <div class="mb-3">
                            <label for="address">Address<span class="required">*</span> </label>
                            <input name="address" value="" type="text" class="form-control" id="address"
                                placeholder="1234 Main St" required="">
                        </div>
                        <div class="mb-3">
                            <label for="note">Note</label>
                            <input name="note" value="" type="text" class="form-control" id="note"
                                placeholder="abc">
                        </div>
                        {{-- <hr class="mb-4"> --}}
                        <div id="checkout-shipping-address-diff">
                        </div>
                        <hr class="mb-4">
                    </div>
            </form>
        </div>
    </div>
@endsection
