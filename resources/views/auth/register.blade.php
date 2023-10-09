{{-- <x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required
                autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>
        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>
        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>
        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                name="password_confirmation" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>
        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>
            <x-primary-button class="ml-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}
@extends('auth.master')
@section('auth')
    <div id="modalRegisterForm">
        <div class="modal-dialog" role="document">
            <form id="register" {{-- onsubmit="event.preventDefault()" --}} method="POST" action="{{ route('register') }}">
                @csrf
                <div class="modal-content">
                    <div class="modal-header text-center">
                        <h4 class="modal-title w-100 font-weight-medium text-left">Sign up</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body mx-3">
                        <!-- Name -->
                        <div class="md-form mb-4">
                            <x-input-label for="name" :value="__('Name')" />
                            <x-text-input placeholder="Your Name" id="name" class="form-control" type="text"
                                name="name" :value="old('name')" required autofocus autocomplete="name" />
                            <x-input-error style="color: red" :messages="$errors->get('name')" class="mt-2" />
                        </div>
                        <!-- Phone -->
                        <div class="md-form mb-4">
                            <x-input-label for="phone" :value="__('Phone')" />
                            <x-text-input onkeypress="return isNumberKey(event)" placeholder="Your Phone" id="phone"
                                class="form-control" type="text" name="phone" :value="old('phone')" required autofocus
                                autocomplete="name" />
                            <x-input-error style="color: red" :messages="$errors->get('phone')" class="mt-2" />
                        </div>
                        <script>
                            function isNumberKey(evt) {
                                var charCode = (evt.which) ? evt.which : evt.keyCode;
                                if (charCode > 31 && (charCode < 48 || charCode > 57))
                                    return false;
                                return true;
                            }
                        </script>
                        <!-- Password -->
                        <div class="md-form mb-4">
                            <x-input-label for="password" :value="__('Password')" />
                            <x-text-input placeholder="Your Password" id="password" class="form-control" type="password"
                                name="password" required autocomplete="new-password" />
                            <x-input-error style="color: red" :messages="$errors->get('password')" class="mt-2" />
                        </div>
                        <!-- Confirm Password -->
                        <div class="md-form mb-4">
                            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                            <x-text-input placeholder="Confirm Password" id="password_confirmation" class="form-control"
                                type="password" name="password_confirmation" required autocomplete="new-password" />
                            <x-input-error style="color: red" :messages="$errors->get('password_confirmation')" class="mt-2" />
                        </div>

                        <div class="modal-footer d-flex justify-content-center">
                            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                href="{{ route('login') }}">
                                {{ __('Already registered?') }}
                            </a>
                            <x-primary-button id="register" class="btn btn-primary">
                                {{ __('Register') }}
                            </x-primary-button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('js-custom')
    <script type="text/javascript">
        $(document).ready(function() {
            $('#phone').on('click', function() {
                var configuration = {
                    widgetId: "336a6563776b363634373331",
                    tokenAuth: "<Auth Token>",
                    identifier: "<enter mobile number/email here> (optional)",
                    exposeMethods: "<true | false> (optional)", // When true will expose the methods for OTP verification. Refer 'How it works?' for more details
                    success: (data) => {
                        // get verified token in response
                        console.log('success response', data);
                    },
                    failure: (error) => {
                        // handle error
                        console.log('failure reason', error);
                    },
                };
            })
        })
    </script>
    <script type="text/javascript" onload="initSendOTP(configuration)"
        src="https://control.msg91.com/app/assets/otp-provider/otp-provider.js"></script>
@endsection
