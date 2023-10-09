@extends('client.layout.master')
@section('main')
    <nav aria-label="breadcrumb" class="w-100 float-left">
        <ol class="breadcrumb parallax justify-content-center" data-source-url="img/banner/parallax.jpg"
            style="background-image: url(&quot;img/banner/parallax.jpg&quot;); background-position: 50% 0.809717%;">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">my-account</li>
        </ol>
    </nav>
    <div  class="main-content w-100 float-left blog-list">
        <div class="container">
            <div class="row">
                <div style="padding-bottom:30px" class="products-grid col-xl-9 col-lg-8 order-lg-2">
                    <div class="row">
                        <div class="col-lg-12 order-lg-last account-content">
                            <h4>Edit Account Information</h4>
                            <form action="#" class="myacoount-form">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group required-field">
                                                    <x-input-label for="name" :value="__('Name')" />
                                                    <x-text-input id="name" name="name" class="form-control"
                                                        type="text" :value="old('name', $user->name)" />
                                                </div>
                                                <!-- End .form-group -->
                                            </div>
                                            <!-- End .col-md-4 -->
                                        </div>
                                        <!-- End .row -->
                                    </div>
                                    <?php
                                    $hidden_email = preg_replace('/(.{2}).*(?=@)/', '$1************', $user->email);
                                    ?>
                                    <!-- End .col-sm-11 -->
                                    <div class="col-sm-12">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group required-field">
                                                    <x-input-label for="email" :value="__('Email')" />
                                                    <x-text-input disabled id="email" name="email" class="form-control"
                                                        type="email" :value="old('email', $hidden_email)" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group required-field">
                                                    <x-input-label for="phone" :value="__('Phone')" />
                                                    <x-text-input disabled id="phone" name="phone" class="form-control"
                                                        type="text" :value="old('phone', $user->phone)" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group required-field">
                                                    <label for="account-password">Password</label>
                                                    <input type="password" class="form-control" id="account-password"
                                                        name="account-password" required="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End .row -->
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="change-password-checkbox"
                                        value="1">
                                    <label class="custom-control-label" for="change-password-checkbox">Change
                                        Password</label>
                                </div>
                                <!-- End .custom-checkbox -->

                                <div id="account-change-password" class="">
                                    <h4>Change Password</h4>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group required-field">
                                                <label for="account-pass2">Password</label>
                                                <input type="password" class="form-control" id="account-pass2"
                                                    name="account-pass2">
                                            </div>
                                            <!-- End .form-group -->
                                        </div>
                                        <!-- End .col-md-6 -->

                                        <div class="col-md-6">
                                            <div class="form-group required-field">
                                                <label for="account-pass3">Confirm Password</label>
                                                <input type="password" class="form-control" id="account-pass3"
                                                    name="account-pass3">
                                            </div>
                                            <!-- End .form-group -->
                                        </div>
                                        <!-- End .col-md-6 -->
                                    </div>
                                    <!-- End .row -->
                                </div>
                                <!-- End #account-chage-pass -->

                                <div class="required text-right">* Required Field</div>
                                <div class="form-footer d-flex justify-content-between align-items-center">
                                    <a href="#"><i class="material-icons">navigate_before</i>Back</a>

                                    <div class="form-footer-right">
                                        <button type="submit" class="btn btn-primary btn-primary">Save</button>
                                    </div>
                                </div>
                                <!-- End .form-footer -->
                            </form>
                        </div>
                    </div>
                </div>
                <div class="sidebar col-xl-3 col-lg-3 order-lg-1">
                    <div class="sidebar-product left-sidebar w-100 float-left">
                        <div class="title">
                            <a data-toggle="collapse" href="#sidebar-product" aria-expanded="false"
                                aria-controls="sidebar-product" class="d-lg-none block-toggler">sale products</a>
                        </div>
                        <div id="sidebar-product" class="collapse w-100 float-left">
                            <div class="sidebar-block sale products">
                                <h3 class="widget-title">sale products</h3>
                                <div class="product-layouts">
                                    <div class="product-thumb">
                                        <div class="image col-sm-4 float-left">
                                            <a href="#">
                                                <img src="img/products/01.jpg" alt="01" /> </a>
                                        </div>
                                        <div class="thumb-description col-sm-8 text-left float-left">
                                            <div class="caption">
                                                <h4 class="product-title text-capitalize"><a
                                                        href="product-details.html">aliquam quaerat voluptatem</a></h4>
                                            </div>
                                            <div class="price">
                                                <div class="regular-price">$100.00</div>
                                                <div class="old-price">$150.00</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-layouts">
                                    <div class="product-thumb">
                                        <div class="image col-sm-4 float-left">
                                            <a href="#">
                                                <img src="img/products/02.jpg" alt="01" /> </a>
                                        </div>
                                        <div class="thumb-description col-sm-8 text-left float-left">
                                            <div class="caption">
                                                <h4 class="product-title text-capitalize"><a
                                                        href="product-details.html">aspetur autodit autfugit</a></h4>
                                            </div>
                                            <div class="price">
                                                <div class="regular-price">$100.00</div>
                                                <div class="old-price">$150.00</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-layouts">
                                    <div class="product-thumb">
                                        <div class="image col-sm-4 float-left">
                                            <a href="#">
                                                <img src="img/products/03.jpg" alt="03" /> </a>
                                        </div>
                                        <div class="thumb-description col-sm-8 text-left float-left">
                                            <div class="caption">
                                                <h4 class="product-title text-capitalize"><a
                                                        href="product-details.html">magni dolores eosquies</a></h4>
                                            </div>
                                            <div class="price">
                                                <div class="regular-price">$100.00</div>
                                                <div class="old-price">$150.00</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
