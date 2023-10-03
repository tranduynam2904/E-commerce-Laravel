@extends('client.layout.master')
@section('main')
<main>
    <!-- Main jumbotron for a primary marketing message or call to action -->
    <!-- Slider start -->
    @include('client.pages.main.components.slider')
    <!-- Slider end -->
    <div class="main-content">
        <!-- Banner start -->
        @include('client.pages.main.components.banner')
        <!-- Banner end -->
        <div id="main">
            <!-- Product Category start -->
            @include('client.pages.main.components.product-category')
            <!-- Product Category end -->
            <!-- SEO & Founder start -->
            @include('client.pages.main.components.seo-founder')
            <!-- SEO & Founder end -->
            <!-- Sub Banner start -->
            @include('client.pages.main.components.sub-banner')
            <!-- Sub Banner end -->
            <!-- Special Product start-->
            @include('client.pages.main.components.special-product')
            <!-- Special Product end-->
            <!-- Latest New start-->
            @include('client.pages.main.components.blog')
            <!-- Latest New end-->
            <!-- Brand Logo start-->
            @include('client.pages.main.components.brand-logo')
            <!-- Brand Logo end-->
        </div>
    </div>
</main>
@endsection
