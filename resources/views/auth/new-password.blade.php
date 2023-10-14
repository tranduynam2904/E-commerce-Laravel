@extends('auth.master')
@section('auth')
    <div id="modalRegisterForm">
        <div class="modal-dialog" role="document">
            <form id="register" method="POST" action="{{ route('profile.new-password.store') }}">
                @csrf
                {{-- {{ dd($users->id) }} --}}
                <div class="modal-content">
                    <div class="modal-header text-center">
                        <h4 class="modal-title w-100 font-weight-medium text-left">Enter Your New Password</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body mx-3">
                        <!-- Phone -->
                        <div class="md-form mb-4">
                            <x-input-label for="new_password" :value="__('New password')" />
                            <x-text-input placeholder="Your Old Password" id="new_password" class="form-control" type="password"
                                name="new_password" value="" autofocus autocomplete="new_password" />
                            <x-input-error style="color: red" :messages="$errors->get('new_password')" class="mt-2" />
                        </div>
                        <div class="md-form mb-4">
                            <x-input-label for="password_confirm" :value="__('Password confirm')" />
                            <x-text-input placeholder="Your New Password" id="phone" class="form-control" type="password"
                                name="password_confirm" value="" autofocus autocomplete="password_confirm" />
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
    </div>
@endsection
