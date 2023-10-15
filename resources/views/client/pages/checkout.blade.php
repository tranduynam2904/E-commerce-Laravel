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
                                    $totalAfterFee = $total - $shipFee;
                                @endphp
                                <strong>Total</strong>
                                <strong>${{ number_format($totalAfterFee, 2) }}</strong>
                            </div>
                            <div class="list-group-item  justify-content-between">
                                <div class="custom-control custom-radio" id="checkbox-card-paypal">
                                    <input id="paypal" name="paymentMethod" type="radio" class="custom-control-input"
                                        required="">
                                    <label class="custom-control-label" for="paypal">Paypal</label>
                                </div>
                            </div>
                            {{-- <a href="order-confirmation.html" class="btn btn-primary btn-lg btn-primary">Place an order</a> --}}
                            <button type="submit" class="btn btn-primary btn-lg btn-primary">Place an order</button>
                        </ul>
                        </div>
                    </div>
                    <div class="cart-block-right col-md-8 order-md-1">
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
                            <label for="address">Address<span class="required">*</span> </label>
                            <input name="address" value="" type="text" class="form-control" id="address" placeholder="1234 Main St"
                                required="">
                        </div>
                        <div class="mb-3">
                            <label for="note">Note</label>
                            <input name="note" value="" type="text" class="form-control" id="note" placeholder="abc">
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
