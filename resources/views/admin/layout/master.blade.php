@include('admin.layout.my-links')
<body>
    <!-- preloader area start -->
    <div id="preloader">
        <div class="loader"></div>
    </div>
    <!-- preloader area end -->
    <!-- page container area start -->
    <div class="page-container">
        <!-- sidebar menu area start -->
        @include('admin.sidebar')
        <!-- sidebar menu area end -->
        <div class="main-content">
            <!-- header area start -->
            @include('admin.header')
            <!-- header area end -->
            <!-- page title area start -->
            @include('admin.page-title-area')
            <!-- page title area end -->
            <!-- page content -->
            @yield('content')
            <!-- /page content -->
        </div>
        <!-- footer area start-->
        @include('admin.footer')
    </div>
    <!-- footer area end-->
   @include('admin.layout.my-scripts')
</body>
</html>
