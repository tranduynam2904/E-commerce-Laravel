<div id="hometab" class="home-tab my-40 my-sm-25 bottom-to-top hb-animate-element">
    <div class="container">
        <div class="row">
            <div class="tt-title d-inline-block float-none w-100 text-center">Trending Products</div>
            <div class="tabs">
                <ul id="product-categories" class="nav nav-tabs justify-content-center">
                    <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#ttfeatured-main"
                            id="featured-tab">
                            <div class="tab-title">{{ $featuredProductCategory->name }}</div>
                        </a></li>
                    <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#ttnew-main" id="new-tab">
                            <div class="tab-title">{{ $latestProductCategory->name }}</div>
                        </a></li>
                    <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#ttbestseller-main"
                            id="bestseller-tab">
                            <div class="tab-title">{{ $bestSellerProductCategory->name }}</div>
                        </a></li>
                </ul>
            </div>
            <div class="tab-content float-left w-100">
                <div class="tab-pane active float-left w-100" id="ttfeatured-main" role="tabpanel"
                    aria-labelledby="featured-tab">
                    <section id="ttfeatured" class="ttfeatured-products">
                        <div class="ttfeatured-content products grid owl-carousel" id="owl1">
                            @foreach ($featuredProducts as $key => $featuredProduct)
                                <div class="product-layouts">
                                    <div class="product-thumb">
                                        @php
                                            $imagesLink = is_null($featuredProduct->image) || !file_exists('images/' . $featuredProduct->image) ? 'https://phutungnhapkhauchinhhang.com/wp-content/uploads/2020/06/default-thumbnail.jpg' : asset('images/' . $featuredProduct->image);
                                        @endphp
                                        @php
                                            $secondImagesLink = is_null($featuredProduct->second_image) || !file_exists('images/' . $featuredProduct->second_image) ? 'https://phutungnhapkhauchinhhang.com/wp-content/uploads/2020/06/default-thumbnail.jpg' : asset('images/' . $featuredProduct->second_image);
                                        @endphp
                                        <div class="image vertical_scrolling_top_to_bottom">
                                            <a href="#">
                                                <img style="height: 220px" src="{{ $imagesLink }}" alt="01" />
                                                <img style="height: 220px" src="{{ $secondImagesLink }}" alt="02"
                                                    class="second_image img-responsive" />
                                            </a>
                                            <div class="button-wrapper">
                                                <div class="button-group text-center">
                                                    <a class="btn btn-primary btn-cart add-to-cart"
                                                        data-target="#cart-pop" data-toggle="modal"
                                                        data-url="{{ route('product.add-to-cart', ['productId' => $featuredProduct->id]) }}">
                                                        <i class="material-icons">shopping_cart</i><span>Add
                                                            to cart</span>
                                                    </a>
                                                    <a href="#" class="btn btn-primary btn-wishlist"><i
                                                            class="material-icons">favorite</i><span>wishlist</span></a>
                                                    <button type="button" class="btn btn-primary btn-compare"><i
                                                            class="material-icons">equalizer</i><span>Compare</span></button>
                                                    <button type="button" class="btn btn-primary btn-quickview"
                                                        {{-- data-toggle="modal" data-target="#product_view" --}}
                                                        ><i
                                                            class="material-icons">visibility</i><span>Quick
                                                            View</span></button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="thumb-description">
                                            <div class="caption">
                                                <h4 class="product-title text-capitalize"><a
                                                        href="#">{{ $featuredProduct->name }}</a>
                                                </h4>
                                            </div>
                                            <div class="rating">
                                                <div class="product-ratings d-inline-block align-middle">
                                                    <span class="fa fa-stack"><i class="material-icons">star</i></span>
                                                    <span class="fa fa-stack"><i class="material-icons">star</i></span>
                                                    <span class="fa fa-stack"><i class="material-icons">star</i></span>
                                                    <span class="fa fa-stack"><i
                                                            class="material-icons off">star</i></span>
                                                    <span class="fa fa-stack"><i
                                                            class="material-icons off">star</i></span>
                                                </div>
                                            </div>
                                            <div class="price">
                                                <div class="regular-price">${{ $featuredProduct->price }}</div>
                                                {{-- <div class="old-price">${{ $featuredProduct->price}}</div> --}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </section>
                </div>
                <div class="tab-pane float-left w-100" id="ttnew-main" role="tabpanel" aria-labelledby="new-tab">
                    <section id="ttnew" class="ttnew-products">
                        <div class="ttnew-content products grid owl-carousel" id="owl2">
                            @foreach ($latestProducts as $key => $latestProduct)
                                <div class="product-layouts">
                                    <div class="product-thumb">
                                        @php
                                            $imagesLink = is_null($latestProduct->image) || !file_exists('images/' . $latestProduct->image) ? 'https://phutungnhapkhauchinhhang.com/wp-content/uploads/2020/06/default-thumbnail.jpg' : asset('images/' . $latestProduct->image);
                                        @endphp
                                        @php
                                            $secondImagesLink = is_null($latestProduct->second_image) || !file_exists('images/' . $latestProduct->second_image) ? 'https://phutungnhapkhauchinhhang.com/wp-content/uploads/2020/06/default-thumbnail.jpg' : asset('images/' . $latestProduct->second_image);
                                        @endphp
                                        <div class="image vertical_scrolling_top_to_bottom">
                                            <a href="#">
                                                <img style="height: 220px" src="{{ $imagesLink }}" alt="01" />
                                                <img style="height: 220px" src="{{ $secondImagesLink }}" alt="02"
                                                    class="second_image img-responsive" />
                                            </a>
                                            <div class="button-wrapper">
                                                <div class="button-group text-center">
                                                    <a class="btn btn-primary btn-cart add-to-cart"
                                                        data-target="#cart-pop" data-toggle="modal"
                                                        data-url="{{ route('product.add-to-cart', ['productId' => $latestProduct->id]) }}">
                                                        <i class="material-icons">shopping_cart</i><span>Add
                                                            to cart</span>
                                                    </a>
                                                    <a href="#" class="btn btn-primary btn-wishlist"><i
                                                            class="material-icons">favorite</i><span>wishlist</span></a>
                                                    <button type="button" class="btn btn-primary btn-compare"><i
                                                            class="material-icons">equalizer</i><span>Compare</span></button>
                                                    <button type="button" class="btn btn-primary btn-quickview"
                                                        {{-- data-toggle="modal" data-target="#product_view" --}}
                                                        ><i
                                                            class="material-icons">visibility</i><span>Quick
                                                            View</span></button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="thumb-description">
                                            <div class="caption">
                                                <h4 class="product-title text-capitalize"><a
                                                        href="#">{{ $latestProduct->name }}</a>
                                                </h4>
                                            </div>
                                            <div class="rating">
                                                <div class="product-ratings d-inline-block align-middle">
                                                    <span class="fa fa-stack"><i
                                                            class="material-icons">star</i></span>
                                                    <span class="fa fa-stack"><i
                                                            class="material-icons">star</i></span>
                                                    <span class="fa fa-stack"><i
                                                            class="material-icons">star</i></span>
                                                    <span class="fa fa-stack"><i
                                                            class="material-icons off">star</i></span>
                                                    <span class="fa fa-stack"><i
                                                            class="material-icons off">star</i></span>
                                                </div>
                                            </div>
                                            <div class="price">
                                                <div class="regular-price">{{ $latestProduct->price }}</div>

                                            </div>

                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </section>
                </div>
                <div class="tab-pane float-left w-100" id="ttbestseller-main" role="tabpanel"
                    aria-labelledby="bestseller-tab">
                    <section id="ttbestseller" class="ttbestseller-products">
                        <div class="ttbestseller-content products grid owl-carousel" id="owl3">
                            @foreach ($bestSellerProducts as $key => $bestSellerProduct)
                                <div class="product-layouts">
                                    <div class="product-thumb">
                                        @php
                                            $imagesLink = is_null($bestSellerProduct->image) || !file_exists('images/' . $bestSellerProduct->image) ? 'https://phutungnhapkhauchinhhang.com/wp-content/uploads/2020/06/default-thumbnail.jpg' : asset('images/' . $bestSellerProduct->image);
                                        @endphp
                                        @php
                                            $secondImagesLink = is_null($bestSellerProduct->second_image) || !file_exists('images/' . $bestSellerProduct->second_image) ? 'https://phutungnhapkhauchinhhang.com/wp-content/uploads/2020/06/default-thumbnail.jpg' : asset('images/' . $bestSellerProduct->second_image);
                                        @endphp
                                        <div class="image vertical_scrolling_top_to_bottom">
                                            <a href="#">
                                                <img style="height: 220px" src="{{ $imagesLink }}" alt="01" />
                                                <img style="height: 220px" src="{{ $secondImagesLink }}" alt="02"
                                                    class="second_image img-responsive" />
                                            </a>
                                            <div class="button-wrapper">
                                                <div class="button-group text-center">
                                                    <a class="btn btn-primary btn-cart add-to-cart"
                                                        data-target="#cart-pop" data-toggle="modal"
                                                        data-url="{{ route('product.add-to-cart', ['productId' => $bestSellerProduct->id]) }}">
                                                        <i class="material-icons">shopping_cart</i><span>Add
                                                            to cart</span>
                                                    </a>
                                                    <a href="#" class="btn btn-primary btn-wishlist"><i
                                                            class="material-icons">favorite</i><span>wishlist</span></a>
                                                    <button type="button" class="btn btn-primary btn-compare"><i
                                                            class="material-icons">equalizer</i><span>Compare</span></button>
                                                    <button type="button" class="btn btn-primary btn-quickview"
                                                        {{-- data-toggle="modal"
                                                        data-target="#product_view" --}}
                                                        ><i
                                                            class="material-icons">visibility</i><span>Quick
                                                            View</span></button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="thumb-description">
                                            <div class="caption">
                                                <h4 class="product-title text-capitalize"><a
                                                        href="#">{{ $bestSellerProduct->name }}</a>
                                                </h4>
                                            </div>

                                            <div class="rating">
                                                <div class="product-ratings d-inline-block align-middle">
                                                    <span class="fa fa-stack"><i
                                                            class="material-icons">star</i></span>
                                                    <span class="fa fa-stack"><i
                                                            class="material-icons">star</i></span>
                                                    <span class="fa fa-stack"><i
                                                            class="material-icons">star</i></span>
                                                    <span class="fa fa-stack"><i
                                                            class="material-icons off">star</i></span>
                                                    <span class="fa fa-stack"><i
                                                            class="material-icons off">star</i></span>
                                                </div>
                                            </div>
                                            <div class="price">
                                                <div class="regular-price">{{ $bestSellerProduct->price }}</div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </section>
                </div>
            </div>

        </div>
    </div>
</div>
@section('js-custom')
    <script>
        $(document).ready(function() {
            $('.add-to-cart').on('click', function(event) {
                event.preventDefault();
                var url = $(this).data('url');
                $.ajax({
                    method: 'get', //method form
                    url: url, //action form
                    success: function(response) {
                        console.log(response);
                        Swal.fire({
                            icon: 'success',
                            // title: 'Notification',
                            text: response.message,
                        });
                        $('#total-items-cart').html(response.total_items);
                        $('#total-price-cart').html('$' + response.total_price.toFixed(2)
                            .replace(
                                /(\d)(?=(\d\d\d)+(?!\d))/g, "$1,"));
                    },
                    statusCode: {
                        401: function() {
                            window.location.href = '{{ route('login') }}';
                        },
                        404: function() {
                            Swal.fire({
                                icon: 'error',
                                text: "Can't add product to cart",
                            });
                        },
                    },
                });
            });
        });
        // Cấu hình carousel
        $(document).ready(function() {
            var owl = $("#owl1");
            owl.owlCarousel({
                rewind: true
            });
        });
        $(document).ready(function() {
            var owl = $("#owl2");
            owl.owlCarousel({
                rewind: true
            });
        });
        $(document).ready(function() {
            var owl = $("#owl3");
            owl.owlCarousel({
                rewind: true
            });
        });
    </script>
@endsection
