
@extends('client.layout.master')
@section('main')
    <div id="modalRegisterForm">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h4 class="modal-title w-100 font-weight-medium text-left">
                        {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
                    </h4>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </form>
                </div>
                {{-- <div class="modal-body mx-3"> --}}
                    <!-- Phone -->
                    {{-- <div class="md-form mb-4">
                        <x-input-label for="phone" :value="__('Phone')" />
                        <x-text-input placeholder="Your Phone" id="phone" class="form-control" type="text"
                            name="phone" :value="old('phone', $user->phone)" autofocus autocomplete="phone" />
                        <x-input-error style="color: red" :messages="$errors->get('phone')" class="mt-2" />
                    </div> --}}
                    <form method="POST" action="{{ route('verification.send') }}">
                        @csrf
                        <div class="modal-footer d-flex justify-content-center">
                            <x-primary-button class="btn btn-primary">
                                {{ __('Resend Verification Email') }}
                            </x-primary-button>
                        </div>
                    </form>
                    {{-- <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <div class="modal-footer d-flex justify-content-center">
                            <x-primary-button class="btn btn-primary">
                                {{ __('Log Out') }}
                            </x-primary-button>
                        </div>
                    </form> --}}
                {{-- </div> --}}
            </div>

        </div>
    </div>
@endsection
