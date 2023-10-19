<div id="ttspecial" class="ttspecial my-40 bottom-to-top hb-animate-element">
    <div class="container">
        <div class="row">
            <div class="tt-title d-inline-block float-none w-100 text-center">special products</div>
            <div class="ttspecial-content products grid owl-carousel">
                @foreach ($saleProducts as $key => $saleProduct)
                    <div class="product-layouts">
                        <div class="product-thumb">
                            @php
                                $imagesLink = is_null($saleProduct->image) || !file_exists('images/' . $saleProduct->image) ? 'https://phutungnhapkhauchinhhang.com/wp-content/uploads/2020/06/default-thumbnail.jpg' : asset('images/' . $saleProduct->image);
                            @endphp
                            @php
                                $secondImagesLink = is_null($saleProduct->second_image) || !file_exists('images/' . $saleProduct->second_image) ? 'https://phutungnhapkhauchinhhang.com/wp-content/uploads/2020/06/default-thumbnail.jpg' : asset('images/' . $saleProduct->second_image);
                            @endphp
                            <div class="image vertical_scrolling_top_to_bottom">
                                <a href="#">
                                    <img style="height: 220px" src="{{ $imagesLink }}" alt="01" />
                                    <img style="height: 220px" src="{{ $secondImagesLink }}" alt="02"
                                        class="second_image img-responsive" />
                                </a>
                                <div class="button-wrapper">
                                    <div class="button-group text-center">
                                        <a class="btn btn-primary btn-cart add-to-cart" data-target="#cart-pop"
                                            data-toggle="modal"
                                            data-url="{{ route('product.add-to-cart', ['productId' => $saleProduct->id]) }}">
                                            <i class="material-icons">shopping_cart</i><span>Add
                                                to cart</span>
                                        </a>
                                        <a href="#" class="btn btn-primary btn-wishlist"><i
                                                class="material-icons">favorite</i><span>wishlist</span></a>
                                        <button type="button" class="btn btn-primary btn-compare"><i
                                                class="material-icons">equalizer</i><span>Compare</span></button>
                                        <button type="button" class="btn btn-primary btn-quickview"
                                            {{-- data-toggle="modal"
                                        data-target="#product_view" --}}><i class="material-icons">visibility</i><span>Quick
                                                View</span></button>
                                    </div>
                                </div>
                            </div>
                            <div class="thumb-description">
                                <div class="caption">
                                    <h4 class="product-title text-capitalize"><a
                                            href="#">{{ $saleProduct->name }}</a>
                                    </h4>
                                </div>

                                <div class="rating">
                                    <div class="product-ratings d-inline-block align-middle">
                                        <span class="fa fa-stack"><i class="material-icons">star</i></span>
                                        <span class="fa fa-stack"><i class="material-icons">star</i></span>
                                        <span class="fa fa-stack"><i class="material-icons">star</i></span>
                                        <span class="fa fa-stack"><i class="material-icons off">star</i></span>
                                        <span class="fa fa-stack"><i class="material-icons off">star</i></span>
                                    </div>
                                </div>
                                <div class="price">
                                    <div class="regular-price">{{ $saleProduct->price }}</div>

                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
