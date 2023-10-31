{{-- <x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ml-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}
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
    {{-- <div id="modalLoginForm">
        <div class="modal-dialog" role="document">
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="modal-content">
                    <div class="modal-header text-center">
                        <h4 class="modal-title w-100 font-weight-medium text-left">Sign in</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span onclick="window.location.href='{{ url('/') }}'" aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body mx-3">
                        <!-- Email -->
                        <div class="md-form mb-4">
                            <x-input-label for="email" :value="__('Email')" />
                            <x-text-input placeholder="Your Email" id="email" type="email" class="form-control"
                                name="email" :value="old('email')" autocomplete="username" />
                            <i class="ti-email"></i>
                            <div class="text-danger"></div>
                            <x-input-error style="color: red" :messages="$errors->get('email')" class="mt-2" />
                        </div>
                        <!-- Password -->
                        <div class="md-form mb-4">
                            <x-input-label for="password" :value="__('Password')" />
                            <x-text-input id="password" class="form-control" placeholder="Your Password" type="password"
                                name="password" required autocomplete="current-password" />
                            <i class="ti-lock"></i>
                            <div class="text-danger"></div>
                            <x-input-error style="color: red" :messages="$errors->get('password')" class="mt-2" />
                        </div>
                        <!-- Remember Me -->
                        <div class="checkbox-link d-flex justify-content-between">
                            <div class="left-col">
                                <input name="remember" type="checkbox" id="customControlAutosizing">
                                <label for="customControlAutosizing">{{ __('Remember me') }}</label>
                            </div>
                            <div class="right-col">
                                @if (Route::has('password.request'))
                                    <a href="{{ route('password.request') }}">{{ __('Forgot your password?') }}</a>
                                @endif
                            </div>

                        </div>
                        <div class="right-col">
                            <a href="{{ route('register') }}">{{ __('Register Account') }}</a>
                        </div>
                    </div>
                    <div class="modal-footer d-flex justify-content-center">
                        <a style="font-size: 13px;
                    letter-spacing: 1px;
                    padding: 10px 20px;
                    outline: none !important;
                    display: inline-block;
                    color: #ffffff !important;
                    text-transform: capitalize;"
                            href="{{ url('auth/google') }}" class="btn btn-danger">Sign in with gmail</a>
                        <button id="login" type="submit" class="btn btn-primary">{{ __('Log in') }}</button>
                    </div>
                </div>
            </form>
        </div>
    </div> --}}

    <div style="margin: 0 auto;" class="col-sm-12 col-md-12 col-xs-12 col-lg-5 mb-30">
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
