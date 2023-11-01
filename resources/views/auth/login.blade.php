
<!-- login area start -->
@extends('client.layout.master')
@section('main')
    @if (session('message'))
        <div style="text-align: center" id="flash-message" class="alert alert-danger">
            {{ session('message') }}
        </div>
        <script>
            setTimeout(function() {
                document.getElementById('flash-message').style.display = 'none';
            }, 3000); // 2 giây
        </script>
        <x-auth-session-status class="mb-4" :status="session('status')" />
    @endif

    <div style="margin: 0 auto;" class="col-sm-12 col-md-12 col-xs-12 col-lg-4 mb-30">
        <!-- Login Form s-->
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="login-form">
                <h4 class="login-title">Login</h4>
                <div class="row">
                    <div class="col-md-12 col-12 mb-20">
                        <x-input-label for="email" :value="__('Email')" />
                        <x-text-input placeholder="Your Email" id="email" type="email" class="mb-0" name="email"
                            :value="old('email')" autocomplete="username" />
                        <x-input-error style="color: red" :messages="$errors->get('email')" class="mt-2" />
                    </div>
                    <div class="col-12 mb-20">
                        <x-input-label for="password" :value="__('Password')" />
                        <x-text-input id="password" class="mb-0" placeholder="Your Password" type="password"
                            name="password" required autocomplete="current-password" />
                        <x-input-error style="color: red" :messages="$errors->get('password')" class="mt-2" />
                    </div>
                    <div class="col-md-8">
                        <div class="check-box d-inline-block ml-0 ml-md-2 mt-10">
                            <input name="remember" type="checkbox" id="remember_me">
                            <label for="remember_me">{{ __('Remember me') }}</label>
                        </div>
                        <div class="check-box d-inline-block ml-0 ml-md-2 mt-10 ">
                            <a href="{{ route('register') }}">{{ __('Register Account') }}</a>
                        </div>
                        <div class="check-box d-inline-block ml-0 ml-md-2 mt-10 mb-10">
                            @if (Route::has('password.request'))
                                <a  href="{{ route('password.request') }}">{{ __('Forgot your password?') }}</a>
                            @endif
                        </div>
                    </div>
                    {{-- <div class="col-md-4 mt-10 mb-20 text-left text-md-right">

                    </div> --}}
                    <div class="col-md-12 mb-15">
                        <button type="submit" class="register-button mt-0">{{ __('Log in') }}</button>
                    </div>
                    <div class="col-md-12 mb-15">
                        <a href="{{ url('auth/google') }}" class="btn btn-danger">Sign In With Gmail</a>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
<!-- login area end -->
