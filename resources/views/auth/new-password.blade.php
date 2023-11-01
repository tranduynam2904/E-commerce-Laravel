@extends('client.layout.master')
@section('main')
    <div style="margin: 0 auto;" class="col-sm-12 col-md-12 col-xs-12 col-lg-5 mb-30">
        <form id="register" method="POST" action="{{ route('profile.new-password.store') }}">
            @csrf
            {{-- {{ dd($users->id) }} --}}
            <div class="login-form">
                <h4 class="login-title">Enter Your New Password</h4>
                <div class="row">
                    <!-- Phone -->
                    <div class="col-md-12 col-12 mb-20">
                        <x-input-label for="new_password" :value="__('New Password')" />
                        <x-text-input placeholder="Your New Password" id="new_password" class="form-control" type="password"
                            name="new_password" value="" autofocus autocomplete="new_password" />
                        <x-input-error style="color: red" :messages="$errors->get('new_password')" class="mt-2" />
                    </div>
                    <div class="col-12 mb-20">
                        <x-input-label for="password_confirm" :value="__('Password Confirm')" />
                        <x-text-input placeholder="Your Password Confirm" id="phone" class="form-control"
                            type="password" name="password_confirm" value="" autofocus
                            autocomplete="password_confirm" />
                        <x-input-error style="color: red" :messages="$errors->get('password_confirm')" class="mt-2" />
                    </div>
                    <div class="modal-footer d-flex justify-content-center">
                        <x-primary-button class="btn btn-primary">
                            {{ __('Submit') }}
                        </x-primary-button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
