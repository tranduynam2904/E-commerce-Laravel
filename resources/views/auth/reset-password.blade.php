{{-- <x-guest-layout>
    <form method="POST" action="{{ route('password.store') }}">
        @csrf

        <!-- Password Reset Token -->
        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $request->email)" required
                autofocus autocomplete="username" />
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
            <x-primary-button>
                {{ __('Reset Password') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}
@extends('auth.master')
@section('auth')
    <div id="modalRegisterForm">
        <div class="modal-dialog" role="document">
            <form method="POST" action="{{ route('password.store') }}">
                @csrf
                <!-- Password Reset Token -->
                <input type="hidden" name="token" value="{{ $request->route('token') }}">
                <div class="modal-content">
                    <div class="modal-header text-center">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span onclick="window.location.href='{{ url('/') }}'" aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body mx-3">

                        <!-- Email -->
                        <div class="md-form mb-4">
                            <x-input-label for="email" :value="__('Email')" />
                            <x-text-input placeholder="Your Email" id="phone" class="form-control" type="email"
                                name="email" :value="old('email')" autofocus autocomplete="email" />
                            <x-input-error style="color: red" :messages="$errors->get('email')" class="mt-2" />
                        </div>
                        <!-- Password -->
                        <div class="md-form mb-4">
                            <x-input-label for="password" :value="__('Password')" />
                            <x-text-input placeholder="Your Email" id="phone" class="form-control" type="password"
                                name="password" :value="old('password')" autofocus autocomplete="password" />
                            <x-input-error style="color: red" :messages="$errors->get('password')" class="mt-2" />
                        </div>
                        <!-- Confirm Password -->
                        <div class="md-form mb-4">
                            <x-input-label for="password_confirmation" :value="__('Password Confirmation')" />
                            <x-text-input placeholder="Your Password Confirmation" id="password_confirmation"
                                class="form-control" type="password" name="password_confirmation" :value="old('password_confirmation')"
                                autofocus autocomplete="password_confirmation" />
                            <x-input-error style="color: red" :messages="$errors->get('password_confirmation')" class="mt-2" />
                        </div>
                        <div class="modal-footer d-flex justify-content-center">
                            <x-primary-button class="btn btn-primary">
                                {{ __('Reset Password') }}
                            </x-primary-button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
