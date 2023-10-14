@extends('auth.master')
@section('auth')
    {{-- @if (session()->has('message'))
<div class="alert alert-success">
    {{ session()->get('message') }}
</div>
@endif --}}
    <div id="modalRegisterForm">
        <div class="modal-dialog" role="document">
            <form id="register" method="POST" action="{{ route('profile.verify-password.store') }}">
                @csrf
                <div class="modal-content">
                    <div class="modal-header text-center">
                        <h4 class="modal-title w-100 font-weight-medium text-left">Enter Your Current Password</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body mx-3">
                        <div class="md-form mb-4">
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
