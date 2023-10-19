<header class="header-area header-sticky text-center header1">
    <div class="header-main-sticky">
        <div class="header-nav">
            <div class="container">
                <div class="nav-left float-left">
                    <div class="ttheader-service">Wants to explore Upcoming Deals on Weekends?</div>
                </div>
                <div class="nav-right float-right d-flex">
                    <div class="language-wrapper toggle">
                        <button type="button" class="btn text-capitalize dropdown-toggle"><img
                                src="{{ asset('assets/client/img/banner/en.png') }}"
                                alt="en" /><span>English</span></button>
                        <div id="language-dropdown" class="language">
                            <ul>
                                <li><img src="{{ asset('assets/client/img/banner/en.png') }}"
                                        alt="en" /><span>English</span></li>
                                <li><img src="{{ asset('assets/client/img/banner/fr.png') }}"
                                        alt="fr" /><span>French</span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="currency-wrapper toggle">
                        <button type="button" class="btn text-capitalize dropdown-toggle"><span>€
                                Euro</span></button>
                        <div id="currency-dropdown" class="currency">
                            <ul>
                                <li><span>€ Euro</span></li>
                                <li><span>£ Pound Sterling</span></li>
                                <li><span>$ US Dollar</span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="ttheader-mail"><a href="mailto:demo.store@gmail.com">demo.store@gmail.com</a></div>
                    <div class="contact">
                        <i class="material-icons">phone</i>
                        <span>1234567890</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-main-head">
            <div class="header-main">
                <div class="container">
                    <div class="header-left float-left d-flex d-lg-flex d-md-block d-xs-block">
                        <div class="logo">
                            <a href="{{ route('home.index') }}"><img
                                    src="{{ asset('assets/client/img/logos/logo-01.png') }}" alt="NatureCircle"></a>
                        </div>
                    </div>
                    <div class="header-middle float-none d-inline-block align-top">
                        <div class="menu">
                            <div class="container">
                                <!-- Navbar -->
                                <nav
                                    class="navbar navbar-expand-lg navbar-light d-sm-none d-xs-none d-lg-block navbar-full">
                                    <!-- Navbar brand -->
                                    <a class="navbar-brand text-uppercase d-none" href="#">Navbar</a>
                                    <!-- Collapse button -->
                                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                                        data-target="#navbarSupportedContent2" aria-controls="navbarSupportedContent2"
                                        aria-expanded="false" aria-label="Toggle navigation">
                                        <span class="navbar-toggler-icon"></span>
                                    </button>
                                    <!-- Collapsible content -->
                                    <div class="collapse navbar-collapse">
                                        <!-- Links -->
                                        <ul class="navbar-nav m-auto justify-content-center">
                                            <li class="nav-item dropdown active">
                                                <a class="nav-link text-uppercase" href="category.html">
                                                    Home
                                                    <span class="sr-only">(current)</span> </a>
                                            </li>
                                            <li class="nav-item dropdown mega-dropdown">
                                                <a class="nav-link dropdown-toggle text-uppercase"
                                                    href="">Category</a>
                                                <div class="dropdown-menu mega-menu v-2 z-depth-1 special-color py-3 px-3"
                                                    aria-labelledby="navbarDropdownMenuLink3">
                                                    <div class="row">
                                                        <div class="col-md-12 col-xl-4 sub-menu mb-xl-0 mb-4">
                                                            <h6
                                                                class="sub-title text-uppercase font-weight-bold white-text">
                                                                Variation 1</h6>
                                                            <!--Featured image-->
                                                            <ul class="list-unstyled">
                                                                <li>
                                                                    <a class="menu-item pl-0" href="">
                                                                        filter toggle </a>
                                                                </li>
                                                                <li>
                                                                    <a class="menu-item pl-0"
                                                                        href="">
                                                                        off canvas left </a>
                                                                </li>
                                                                <li>
                                                                    <a class="menu-item pl-0"
                                                                        href="">
                                                                        off canvas right </a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <div class="col-md-6 col-xl-4 sub-menu mb-md-0 mb-4">
                                                            <h6
                                                                class="sub-title text-uppercase font-weight-bold white-text">
                                                                Variation 2</h6>
                                                            <ul class="list-unstyled">
                                                                <li>
                                                                    <a class="menu-item pl-0"
                                                                        href="">
                                                                        5 columns mode </a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        {{-- <div class="col-md-6 col-xl-4 sub-menu mb-0">
                                                            <ul class="list-unstyled">
                                                                <li>
                                                                    <span class="menu-banner"><img
                                                                            src="{{ asset('assets/client/img/banner/menu-banner.jpg') }}"
                                                                            alt="menu-banner" /></span>
                                                                </li>
                                                            </ul>
                                                        </div> --}}
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="nav-item dropdown">
                                                <a class="nav-link dropdown-toggle text-uppercase" href="">
                                                    Shop
                                                    <span class="sr-only">(current)</span> </a>
                                                <div
                                                    class="dropdown-menu mega-menu v-2 z-depth-1 special-color py-3 px-3">
                                                    <div class="sub-menu mb-xl-0 mb-4">
                                                        <ul class="list-unstyled">
                                                            <li>
                                                                <a class="menu-item pl-0" href="">
                                                                    product grid </a>
                                                            </li>
                                                            <li>
                                                                <a class="menu-item pl-0"
                                                                    href="">
                                                                    sticky right </a>
                                                            </li>
                                                            <li>
                                                                <a class="menu-item pl-0"
                                                                    href="">
                                                                    Extended layout </a>
                                                            </li>
                                                            <li>
                                                                <a class="menu-item pl-0" href="">
                                                                    Default layout </a>
                                                            </li>
                                                            <li>
                                                                <a class="menu-item pl-0" href="">
                                                                    compact layout </a>
                                                            </li>
                                                        </ul>

                                                    </div>
                                                </div>
                                            </li>
                                            <li class="nav-item dropdown">
                                                <a class="nav-link text-uppercase" href="">Blog</a>
                                                {{-- <div class="dropdown-menu mega-menu v-2 z-depth-1 special-color py-3 px-3"
                                                    aria-labelledby="navbarDropdownMenuLink5">
                                                    <div class="sub-menu">
                                                        <h6
                                                            class="sub-title text-uppercase font-weight-bold white-text d-none">
                                                            Featured</h6>
                                                        <ul class="list-unstyled">
                                                            <li>
                                                                <a class="menu-item pl-0" href="blog-2-column.html">
                                                                    blog 2 column </a>
                                                            </li>
                                                            <li>
                                                                <a class="menu-item pl-0" href="blog-3-column.html">
                                                                    blog 3 column </a>
                                                            </li>
                                                            <li>
                                                                <a class="menu-item pl-0"
                                                                    href="blog-2-column-masonary.html">
                                                                    blog masonary </a>
                                                            </li>
                                                            <li>
                                                                <a class="menu-item pl-0" href="blog-list.html">
                                                                    blog list </a>
                                                            </li>
                                                            <li>
                                                                <a class="menu-item pl-0" href="blog-details.html">
                                                                    blog details </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div> --}}
                                            </li>
                                            <li class="nav-item dropdown">
                                                <a class="nav-link dropdown-toggle text-uppercase"
                                                    href="">Pages</a>
                                                <div class="dropdown-menu mega-menu v-2 z-depth-1 special-color py-3 px-3"
                                                    aria-labelledby="navbarDropdownMenuLink5">
                                                    <div class="sub-menu">
                                                        <ul class="list-unstyled">
                                                            <li>
                                                                <a class="menu-item pl-0" href="">
                                                                    About us </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="nav-item dropdown">
                                                <a class="nav-link text-uppercase" href="">contact
                                                    us</a>
                                            </li>
                                        </ul>
                                        <!-- Links -->
                                    </div>
                                    <!-- Collapsible content -->
                                </nav>

                                <!-- Navbar Responsive -->
                                <nav class="navbar navbar-expand-lg navbar-dark d-lg-none navbar-responsive">
                                    <!-- Navbar brand -->
                                    <a class="navbar-brand text-uppercase d-none" href="#">Navbar</a>
                                    <!-- Collapse button -->
                                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                                        data-target="#navbarSupportedContent2" aria-controls="navbarSupportedContent2"
                                        aria-expanded="false" aria-label="Toggle navigation">
                                        <span class="navbar-toggler-icon"><i class='material-icons'>sort</i></span>
                                    </button>
                                    <!-- Collapsible content -->
                                    <div class="collapse navbar-collapse" id="navbarSupportedContent2">
                                        <!-- Links -->
                                        <ul class="navbar-nav m-auto justify-content-center">
                                            <!-- Features -->
                                            <li class="nav-item dropdown active">
                                                <a class="nav-link dropdown-toggle text-uppercase"
                                                    data-toggle="collapse" data-target="#menu1" aria-controls="menu1"
                                                    aria-label="Toggle navigation">
                                                    Home
                                                    <span class="sr-only">(current)</span></a>
                                            </li>
                                            <li class="nav-item dropdown mega-dropdown">
                                                <a class="nav-link dropdown-toggle text-uppercase"
                                                    data-toggle="collapse" data-target="#menu3" aria-controls="menu3"
                                                    aria-expanded="false" aria-label="Toggle navigation">Category</a>
                                                <div class="dropdown-menu mega-menu v-2 z-depth-1 special-color py-3 px-3"
                                                    id="menu3">
                                                    <div class="row">
                                                        <div class="col-md-12 col-xl-4 sub-menu mb-xl-0 mb-4">
                                                            <h6
                                                                class="sub-title text-uppercase font-weight-bold white-text">
                                                                Variation 1</h6>
                                                            <!--Featured image-->
                                                            <ul class="list-unstyled">
                                                                <li>
                                                                    <a class="menu-item pl-0"
                                                                        href="">
                                                                        filter toggle </a>
                                                                </li>
                                                                <li>
                                                                    <a class="menu-item pl-0"
                                                                        href="">
                                                                        off canvas left </a>
                                                                </li>
                                                                <li>
                                                                    <a class="menu-item pl-0"
                                                                        href="">
                                                                        off canvas right </a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <div class="col-md-6 col-xl-4 sub-menu mb-md-0 mb-4">
                                                            <h6
                                                                class="sub-title text-uppercase font-weight-bold white-text">
                                                                Variation 2</h6>
                                                            <ul class="list-unstyled">
                                                                <li>
                                                                    <a class="menu-item pl-0"
                                                                        href="">
                                                                        grid 5 column </a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        {{-- <div class="col-md-6 col-xl-4 sub-menu mb-0">

                                                            <ul class="list-unstyled">
                                                                <li>
                                                                    <span class="menu-banner"><img
                                                                            src="{{ asset('assets/client/img/banner/menu-banner.jpg') }}"
                                                                            alt="menu-banner" /></span>
                                                                </li>
                                                            </ul>
                                                        </div> --}}
                                                    </div>
                                                </div>
                                            </li>

                                            <li class="nav-item dropdown">
                                                <a class="nav-link dropdown-toggle text-uppercase"
                                                    data-toggle="collapse" data-target="#menu2" aria-controls="menu2"
                                                    aria-expanded="false" aria-label="Toggle navigation">
                                                    Shop
                                                    <span class="sr-only">(current)</span> </a>
                                                <div class="dropdown-menu mega-menu v-2 z-depth-1 special-color py-3 px-3"
                                                    id="menu2">
                                                    <div class="sub-menu mb-xl-0 mb-4">
                                                        <h6
                                                            class="sub-title text-uppercase font-weight-bold white-text">
                                                            Featured</h6>
                                                        <ul class="list-unstyled">
                                                            <li>
                                                                <a class="menu-item pl-0" href="">
                                                                    product grid </a>
                                                            </li>
                                                            <li>
                                                                <a class="menu-item pl-0"
                                                                    href="">
                                                                    sticky right </a>
                                                            </li>
                                                            <li>
                                                                <a class="menu-item pl-0"
                                                                    href="">
                                                                    Extended layout </a>
                                                            </li>
                                                            <li>
                                                                <a class="menu-item pl-0" href="">
                                                                    Default layout </a>
                                                            </li>
                                                            <li>
                                                                <a class="menu-item pl-0" href="">
                                                                    compact layout </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </li>

                                            <!-- Technology -->
                                            <li class="nav-item dropdown">
                                                <a class="nav-link dropdown-toggle text-uppercase"
                                                    data-toggle="collapse" data-target="#menu4" aria-controls="menu4"
                                                    aria-expanded="false" aria-label="Toggle navigation">Blog</a>
                                                <div class="dropdown-menu mega-menu v-2 z-depth-1 special-color py-3 px-3"
                                                    id="menu4">
                                                    <div class="sub-menu">
                                                        <h6
                                                            class="sub-title text-uppercase font-weight-bold white-text d-none">
                                                            Featured</h6>
                                                        <ul class="list-unstyled">
                                                            <li>
                                                                <a class="menu-item pl-0" href="">
                                                                    blog 2 column </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="nav-item dropdown">
                                                <a class="nav-link text-uppercase" href="">contact
                                                    us</a>
                                            </li>
                                            <li class="nav-item dropdown">
                                                <a class="nav-link dropdown-toggle text-uppercase"
                                                    data-toggle="collapse" data-target="#menu5" aria-controls="menu5"
                                                    aria-expanded="false" aria-label="Toggle navigation">Pages</a>
                                                <div class="dropdown-menu mega-menu v-2 z-depth-1 special-color py-3 px-3"
                                                    id="menu5">
                                                    <div class="sub-menu">
                                                        <h6
                                                            class="sub-title text-uppercase font-weight-bold white-text d-none">
                                                            Featured</h6>
                                                        <ul class="list-unstyled">
                                                            <li>
                                                                <a class="menu-item pl-0" href="">
                                                                    About us </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                        <!-- Links -->
                                    </div>
                                    <!-- Collapsible content -->
                                </nav>
                            </div>
                        </div>
                    </div>
                    <div class="header-right d-flex d-xs-flex d-sm-flex justify-content-end float-right">
                        <!-- Search -->
                        <div class="search-wrapper">
                            <a>
                                <i class="material-icons search">search</i>
                                <i class="material-icons close">close</i>
                            </a>
                            <form autocomplete="off" action="/action_page.php" class="search-form">
                                <div class="autocomplete" style="width:300px;">
                                    <input id="myInput" type="text" name="myCountry" placeholder="Search here">
                                    <button type="button"><i class="material-icons">search</i></button>
                                </div>
                            </form>
                        </div>

                        <!-- User Info -->
                        <div style="
                        @if (Auth::check()) margin-right:30px; @endif"
                            class="user-info">
                            <button style="@if (Auth::check()) display: flex; align-items:center; @endif"
                                type="button" class="btn">
                                <i class="material-icons">perm_identity</i>
                                <div
                                    style="
                                    @if (Auth::check()) color: white; width: 50px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; @endif">
                                    @if (Auth::check())
                                        {{ Auth::user()->name }}
                                    @endif
                                </div>
                            </button>

                            <div id="user-dropdown" class="user-menu">
                                <ul>
                                    @if (Auth::check())
                                        <li><a href="{{ route('profile.edit') }}" class="text-capitalize">my
                                                account</a></li>
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf
                                            <li><x-dropdown-link id="logout" class="text-capitalize"
                                                    :href="route('logout')"
                                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                                    {{ __('Log Out') }}
                                                </x-dropdown-link>
                                            </li>
                                        </form>
                                    @else
                                        <li><a href="{{ route('register') }}" class="modal-view button"
                                                {{-- data-toggle="modal"  --}} data-target="#modalRegisterForm">Register</a>
                                        </li>
                                        <li><a href="{{ 'login' }}" class="modal-view button"
                                                {{-- data-toggle="modal" --}} data-target="#modalLoginForm">login</a>
                                        </li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                        <!-- Shopping Cart -->
                        <div class="cart-wrapper">
                            <a href="{{ route('cart.index') }}">

                                <button type="button" class="btn">
                                    <i class="material-icons">shopping_cart</i>
                                    {{-- @foreach ($totalCart as $item) --}}
                                    <span id="total-items-cart"
                                        class="ttcount">{{ count(session()->get('cart', [])) }}</span>

                                    {{-- @endforeach --}}
                                </button>

                            </a>

                            {{-- <div id="cart-dropdown" class="cart-menu">
                                <ul class="w-100 float-left">
                                    <li>
                                        <table class="table table-striped">
                                            <tbody>
                                                <tr>
                                                    <td class="text-center"><a href="#"><img
                                                                src="{{ asset('assets/client/img/products/01.jpg') }}"
                                                                alt="01" title="01"></a></td>
                                                    <td class="text-left product-name"><a href="#">aliquam
                                                            quaerat voluptatem</a>
                                                        <div class="quantity float-left w-100">
                                                            <span class="cart-qty">1 × </span>
                                                            <span class="text-left price"> $20.00</span>
                                                        </div>
                                                    </td>
                                                    <td class="text-center close"><a class="close-cart"><i
                                                                class="material-icons">close</i></a></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </li>
                                    <li>
                                        <table class="table price mb-30">
                                            <tbody>
                                                <tr>
                                                    <td class="text-left"><strong>Total</strong></td>
                                                    <td class="text-right"><strong>$2,122.00</strong></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </li>
                                    <li class="buttons w-100 float-left">
                                        <form action="cart_page.html">
                                            <input class="btn pull-left mt_10 btn-primary btn-rounded w-100"
                                                value="View cart" type="submit">
                                        </form>
                                        <form action="checkout_page.html">
                                            <input class="btn pull-right mt_10 btn-primary btn-rounded w-100"
                                                value="Checkout" type="submit">
                                        </form>
                                    </li>
                                </ul>
                            </div> --}}
                              {{-- @php
                            $cart = session()->get('cart', []);
                            $total = 0;
                            foreach ($cart as $item) {
                                $total += $item['price'] * $item['qty'];
                            }
                        @endphp
                             <span
                                id="total-price-cart">${{ number_format($total, 2) }}</span> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</header>
