<header class="header-area header-sticky text-center header1">
    <div class="header-main-sticky">
        <div class="header-nav">
            <div class="container">
                <div class="nav-left float-left">
                    <div class="ttheader-service">Wants to explore Upcoming Deals on Weekends?</div>
                </div>
                <div class="nav-right float-right d-flex">
                    <div class="language-wrapper toggle">
                        <button type="button" class="btn text-capitalize dropdown-toggle"><img src="{{ asset('assets/client/img/banner/en.png') }}"
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
                            <a href="index.html"><img src="{{ asset('assets/client/img/logos/logo-01.png') }}"
                                    alt="NatureCircle"></a>
                        </div>
                    </div>
                    <div class="header-middle float-none d-inline-block align-top">
                        <div class="menu">
                            <div class="container">
                                <!-- Navbar -->
                                @include('client.pages.header.components.navbar')
                                <!-- Navbar -->
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
                                            @include('client.pages.header.components.features')
                                            <!-- Technology -->
                                            @include('client.pages.header.components.technology')
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
                        @include('client.pages.header.components.search')
                        <!-- User Info -->
                        @include('client.pages.header.components.user')
                        <!-- Shopping Cart -->
                        @include('client.pages.header.components.cart')
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
