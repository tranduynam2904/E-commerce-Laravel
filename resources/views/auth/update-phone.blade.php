@extends('auth.master')
@section('auth')
{{-- @if(session()->has('message'))
<div class="alert alert-success">
    {{ session()->get('message') }}
</div>
@endif --}}
    <div id="modalRegisterForm">
        <div class="modal-dialog" role="document">
            <form id="register" method="POST" action="{{ route('profile.phone.update-phone') }}">
                @csrf
                @method('patch')
                {{-- {{ dd($users->id) }} --}}
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
                            <x-text-input placeholder="Your Phone" id="phone" class="form-control"
                                type="text" name="phone" :value="old('phone', $user->phone)" autofocus autocomplete="phone" />
                            <x-input-error style="color: red" :messages="$errors->get('phone')" class="mt-2" />
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
