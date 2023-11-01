@extends('client.layout.master')
@section('main')
    {{-- @if (session()->has('message'))
<div class="alert alert-success">
    {{ session()->get('message') }}
</div>
@endif --}}
    <div style="margin: 0 auto;" class="col-sm-12 col-md-12 col-xs-12 col-lg-4 mb-30">
        <form id="register" method="POST" action="{{ route('profile.phone.update-phone') }}">
            @csrf
            @method('patch')
            {{-- {{ dd($users->id) }} --}}
            <div class="login-form">
                <h4 class="login-title">Enter Your Phone</h4>
                <div class="row">
                    <!-- Phone -->
                    <div class="col-md-12 col-12 mb-20">
                        <x-input-label for="phone" :value="__('Phone')" />
                        <x-text-input placeholder="Twilio trial account only 0385542181 can receive otp " id="phone" class="form-control" type="text"
                            name="phone" :value="old('phone', $user->phone)" autofocus autocomplete="phone" />
                        <x-input-error style="color: red" :messages="$errors->get('phone')" class="mt-2" />
                    </div>
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
