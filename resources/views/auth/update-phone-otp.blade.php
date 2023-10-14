@extends('auth.master')
@section('auth')
    <div id="modalRegisterForm">
        <div class="modal-dialog" role="document">
            <form id="register" method="post" action="{{ route('profile.phone.verifyOtp.store') }}">
                @csrf
                <div class="modal-content">
                    <div class="modal-header text-center">
                        <h4 class="modal-title w-100 font-weight-medium text-left">Enter Your Phone</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body mx-3">
                        <!-- Phone -->
                        <div class="md-form mb-4">
                            <x-input-label for="phone" :value="__('Phone')" />
                            <x-text-input readonly placeholder="Your Phone" id="phone" class="form-control"
                                type="text" name="phone" :value="old('phone', $user['phone'])" required autofocus autocomplete="name" />
                            {{-- <x-input-error style="color: red" :messages="$errors->get('phone')" class="mt-2" /> --}}
                        </div>
                        <!-- Enter Otp -->
                        <div class="md-form mb-4">
                            <x-input-label for="otp" :value="__('Otp')" />
                            <x-text-input placeholder="Enter Otp" id="otp" class="form-control" type="text"
                                name="otp" oninput="validateOtp(this)"  required autocomplete="otp" />
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
                        <div class="modal-footer d-flex justify-content-center">
                            <x-primary-button class="btn btn-primary">
                                {{ __('Submit') }}
                            </x-primary-button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
