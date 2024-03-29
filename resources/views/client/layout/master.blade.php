@include('client.layout.my-links')

{{-- <body class="index layout4">
    <!-- Header -->
    @include('client.header')
    <!-- Header -->
    <!-- Main -->
    {{-- @include('client.pages.main.main') --}}
{{-- @yield('main') --}}
<!-- Main -->
<!-- Footer -->
{{-- @include('client.footer') --}}
<!-- Footer -->
{{-- <div class="alert text-center cookiealert" role="alert">
    <b>Do you like cookies?</b> We use cookies to ensure you get the best experience on our website. <a
        href="https://cookiesandyou.com/">Learn more</a>

    <button type="button" class="btn btn-primary btn-sm acceptcookies" aria-label="Close">
        I agree
    </button>
</div> --}}

<!-- Register modal -->
{{-- @include('auth.register') --}}
{{-- @yield('register') --}}
<!-- Login modal -->
{{-- @include('auth.login') --}}

<!-- product_view modal -->
{{-- <div class="modal fade product_view" id="product_view" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title w-100w-100w-100 font-weight-bold d-none">Quick view</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6 left-columm">
                        <div class="product-large-image tab-content">
                            <div class="tab-pane active" id="product-1" role="tabpanel" aria-labelledby="product-tab-1">
                                <div class="single-img img-full">
                                    <a href="{{ asset('assets/client/img/products/01.jpg') }}"><img
                                            src="{{ asset('assets/client/img/products/01.jpg') }}" class="img-fluid"
                                            alt=""></a>
                                </div>
                            </div>
                            <div class="tab-pane" id="product-2" role="tabpanel" aria-labelledby="product-tab-2">
                                <div class="single-img">
                                    <a href="{{ asset('assets/client/img/products/02.jpg') }}"><img
                                            src="{{ asset('assets/client/img/products/02.jpg') }}" class="img-fluid"
                                            alt=""></a>
                                </div>
                            </div>
                            <div class="tab-pane" id="product-3" role="tabpanel" aria-labelledby="product-tab-3">
                                <div class="single-img">
                                    <a href="{{ asset('assets/client/img/products/03.jpg') }}"><img
                                            src="{{ asset('assets/client/img/products/03.jpg') }}" class="img-fluid"
                                            alt=""></a>
                                </div>
                            </div>
                            <div class="tab-pane" id="product-4" role="tabpanel" aria-labelledby="product-tab-4">
                                <div class="single-img">
                                    <a href="{{ asset('assets/client/img/products/04.jpg') }}"><img
                                            src="{{ asset('assets/client/img/products/04.jpg') }}" class="img-fluid"
                                            alt=""></a>
                                </div>
                            </div>
                            <div class="tab-pane" id="product-5" role="tabpanel" aria-labelledby="product-tab-5">
                                <div class="single-img">
                                    <a href="{{ asset('assets/client/img/products/05.jpg') }}"><img
                                            src="{{ asset('assets/client/img/products/05.jpg') }}" class="img-fluid"
                                            alt=""></a>
                                </div>
                            </div>
                        </div>
                        <div class="small-image-list float-left w-100">
                            <div class="nav-add small-image-slider-single-product-tabstyle-3 owl-carousel"
                                role="tablist">
                                <div class="single-small-image img-full">
                                    <a data-toggle="tab" id="product-tab-1" href="#product-1" class="img active"><img
                                            src="{{ asset('assets/client/img/products/01.jpg') }}" class="img-fluid"
                                            alt=""></a>
                                </div>
                                <div class="single-small-image img-full">
                                    <a data-toggle="tab" id="product-tab-2" href="#product-2" class="img"><img
                                            src="{{ asset('assets/client/img/products/02.jpg') }}" class="img-fluid"
                                            alt=""></a>
                                </div>
                                <div class="single-small-image img-full">
                                    <a data-toggle="tab" id="product-tab-3" href="#product-3" class="img"><img
                                            src="{{ asset('assets/client/img/products/03.jpg') }}" class="img-fluid"
                                            alt=""></a>
                                </div>
                                <div class="single-small-image img-full">
                                    <a data-toggle="tab" id="product-tab-4" href="#product-4" class="img"><img
                                            src="{{ asset('assets/client/img/products/04.jpg') }}" class="img-fluid"
                                            alt=""></a>
                                </div>
                                <div class="single-small-image img-full">
                                    <a data-toggle="tab" id="product-tab-5" href="#product-5" class="img"><img
                                            src="{{ asset('assets/client/img/products/05.jpg') }}" class="img-fluid"
                                            alt=""></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 product_content">
                        <h4 class="product-title text-capitalize">aliquam quaerat voluptatem</h4>
                        <div class="rating">
                            <div class="product-ratings d-inline-block align-middle">
                                <span class="fa fa-stack"><i class="material-icons">star</i></span>
                                <span class="fa fa-stack"><i class="material-icons">star</i></span>
                                <span class="fa fa-stack"><i class="material-icons">star</i></span>
                                <span class="fa fa-stack"><i class="material-icons off">star</i></span>
                                <span class="fa fa-stack"><i class="material-icons off">star</i></span>
                            </div>
                        </div>
                        <span class="description float-left w-100">Lorem Ipsum is simply dummy text of the
                            printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy
                            text ever since the 1500s, when an unknown printer took a galley of type and scrambled
                            it to make a type specimen book.</span>
                        <h3 class="price float-left w-100"><span class="regular-price align-middle">$75.00</span><span
                                class="old-price align-middle">$60.00</span></h3>

                        <div class="product-variants float-left w-100">
                            <div class="col-md-4 col-sm-6 col-xs-12 size-options d-flex align-items-center">
                                <h5>Size:</h5>

                                <select class="form-control" name="select">
                                    <option value="" selected="">Size</option>
                                    <option value="black">Medium</option>
                                    <option value="white">Large</option>
                                    <option value="gold">Small</option>
                                    <option value="rose gold">Extra large</option>
                                </select>
                            </div>
                            <div class="color-option d-flex align-items-center">
                                <h5>color :</h5>
                                <ul class="color-categories">
                                    <li class="active">
                                        <a class="tt-pink" href="#" title="Pink"></a>
                                    </li>
                                    <li>
                                        <a class="tt-blue" href="#" title="Blue"></a>
                                    </li>
                                    <li>
                                        <a class="tt-yellow" href="#" title="Yellow"></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="btn-cart d-flex align-items-center float-left w-100">
                            <h5>qty:</h5>
                            <input value="1" type="number">
                            <button type="button" class="btn btn-primary"><i
                                    class="material-icons">shopping_cart</i> Add To Cart</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> --}}

<!-- cart-pop modal -->
{{-- @include('client.pages.add-to-cart')
<!-- Compare Product -->
@include('client.pages.compare')
@include('client.layout.my-scripts')
</body> --}}

<body>
    <!--[if lt IE 8]>
  <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
 <![endif]-->
    <!-- Begin Body Wrapper -->
    <div class="body-wrapper">
        <!-- Begin Header Area -->
        @include('client.header')
        <!-- Header Area End Here -->

        @yield('main')
        <!-- Begin Footer Area -->
        @include('client.footer')
        <!-- Footer Area End Here -->
    </div>
    <!-- Body Wrapper End Here -->
</body>
@include('client.layout.my-scripts')
