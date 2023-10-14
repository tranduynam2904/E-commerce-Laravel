@extends('auth.master')
@section('auth')
    {{-- @if (session()->has('message'))
<div class="alert alert-success">
    {{ session()->get('message') }}
</div>
@endif --}}
    <div id="modalRegisterForm">
        <div class="modal-dialog" role="document">
            {{-- <form id="register" method="POST" action="{{ route('profile.phone.update') }}">
                @csrf
                @method('patch') --}}
            {{-- {{ dd($users->id) }} --}}
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h4 style="text-align: center;font-size:25px;" class="modal-title w-100 font-weight-medium">Verify
                    </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body mx-3">
                    <!-- Phone -->
                    <div class="md-form mb-4">
                        {{-- <x-input-label for="phone" :value="__('Phone')" /> --}}
                        <h6>To increase the security of your account, verify your information using one of the following
                            methods.</h6>
                    </div>
                    {{-- @if

                    @endif --}}
                    <div class="modal-footer d-flex justify-content-center">
                        <a href="{{ route('profile.verify-password') }}" style="border-radius: 0px" class="btn btn-primary"
                            href="">Password Verify</a>
                    </div>
                    <div class="modal-footer d-flex justify-content-center">
                        <a style="border-radius: 0px" class="btn btn-primary" href="">Phone Verify</a>
                    </div>
                </div>
            </div>
            {{-- </form> --}}
        </div>
    </div>
@endsection
