@extends('auth.master')
@section('auth')
    <div id="modalRegisterForm">
        <div class="modal-dialog" role="document">
            <form id="register" {{-- onsubmit="event.preventDefault()" --}} method="POST"
                {{-- action="{{ route('otp.store', ['user_id' => $users->id]) }}" --}}
                >
                @csrf
                {{-- {{ dd($users->id) }} --}}
                <div class="modal-content">
                    <div class="modal-header text-center">
                        <h4 class="modal-title w-100 font-weight-medium text-left">Enter Otp SMS</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body mx-3">

                        <!-- Phone -->
                        <div class="md-form mb-4">
                            <x-input-label for="phone" :value="__('Phone')" />
                            <x-text-input disabled placeholder="Your Phone" id="phone" class="form-control"
                                type="text" name="phone" :value="old('phone', $users->phone)" required autofocus autocomplete="name" />
                            <x-input-error style="color: red" :messages="$errors->get('phone')" class="mt-2" />
                        </div>
                        <!-- Enter Otp -->

                        <div class="md-form mb-4">
                            <x-input-label for="email" :value="__('Otp')" />
                            <x-text-input placeholder="Enter Otp" id="email" class="form-control" type="email"
                                name="email" :value="old('email')" required autocomplete="username" />
                            <x-input-error style="color: red" :messages="$errors->get('otp')" class="mt-2" />
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
