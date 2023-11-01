@extends('client.layout.master')
@section('main')
    <div style="margin: 0 auto;" class="col-sm-12 col-md-12 col-xs-12 col-lg-4 mb-30">
        <form id="register" method="POST" action="{{ route('profile.verify-password.store') }}">
            @csrf
            <div class="login-form">
                <h4 style="font-size: 1.5rem; text-align: center" class="login-title">Enter Your Current Password</h4>
                <div class="row">
                    <div class="col-md-12 col-12 mb-20">
                        <x-text-input placeholder="Your current password" id="current_password" class="form-control"
                            type="password" name="current_password" :value="old('current_password')" autofocus
                            autocomplete="current_password" />
                        {{-- <x-input-error style="color: red" :messages="$errors->get('current_password')" class="mt-2" /> --}}
                        @if (session()->has('message'))
                            <div class="alert alert-danger">
                                {{ session()->get('message') }}
                            </div>
                        @endif
                    </div>
                    <div style="text-align: center" class="col-md-12 mb-15">
                        <x-primary-button class="btn btn-primary">
                            {{ __('Submit') }}
                        </x-primary-button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
