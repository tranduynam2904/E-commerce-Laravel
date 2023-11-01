@extends('client.layout.master')
@section('main')
    <div style="margin: 0 auto;" class="col-sm-12 col-md-12 col-xs-12 col-lg-4 mb-30">
        <form id="register" method="post" action="{{ route('profile.phone.verifyOtp.store') }}">
            @csrf
            <div class="login-form">
                <h4 class="login-title">Enter Your Phone</h4>
                <div class="row">
                    <!-- Phone -->
                    <div class="col-md-12 col-12 mb-20">
                        <x-input-label for="phone" :value="__('Phone')" />
                        <x-text-input readonly placeholder="Your Phone" id="phone" class="form-control" type="text"
                            name="phone" :value="old('phone', $user['phone'])" required autofocus autocomplete="name" />
                        {{-- <x-input-error style="color: red" :messages="$errors->get('phone')" class="mt-2" /> --}}
                    </div>
                    <!-- Enter Otp -->
                    <div class="col-md-12 col-12 mb-20">
                        <x-input-label for="otp" :value="__('Otp')" />
                        <x-text-input placeholder="Enter Otp" id="otp" class="form-control" type="text"
                            name="otp" oninput="validateOtp(this)" required autocomplete="otp" />
                        <x-input-error style="color: red" :messages="$errors->get('otp')" class="mt-2" />
                    </div>
                    <script>
                        function validateOtp(input) {
                            // Get value Input
                            var otp = input.value;

                            // Remove non-numeric characters
                            otp = otp.replace(/\D/g, '');

                            // Limit 6 numbers
                            otp = otp.slice(0, 6);

                            // Assign the parameter value
                            input.value = otp;
                        }
                    </script>
                   <div class="col-md-12 mb-15">
                        <x-primary-button class="btn btn-primary">
                            {{ __('Submit') }}
                        </x-primary-button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
