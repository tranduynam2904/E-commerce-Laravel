@include('client.layout.my-links')
<style>
    .header_custom {
        height: 100px;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .header-area-custom {
        background: #1c1e21
    }
</style>

<header style="float:none;" class="header-area-custom">
    <div class="header-main-sticky">
        <div class="header-main-head-custom">
            <div class="header-main">
                <div class="container">
                    <div class="header_custom">
                        <div class="logo">
                            <a href="{{ url('/') }}"><img src="{{ asset('assets/client/img/logos/logo-01.png') }}"
                                    alt="NatureCircle"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
@yield('auth')
@include('client.layout.my-scripts')
