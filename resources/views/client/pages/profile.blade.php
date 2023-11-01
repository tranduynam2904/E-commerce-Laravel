@extends('client.layout.master')
@section('main')
        <form method="post" action="{{ route('profile.edit.update-profile') }}">
            @csrf
            <div class="login-form">
                <div style="margin: 0 auto;" class="col-sm-12 col-md-12 col-xs-12 col-lg-4 mb-30">
                    @if (session('message'))
                    <div id="flash-message" class="alert alert-success ">
                        {{ session('message') }}
                    </div>
                    <script>
                        setTimeout(function() {
                            document.getElementById('flash-message').style.display = 'none';
                        }, 3000); // 3 sec
                    </script>
                @endif
                <h4 class="login-title">My Profile</h4>
                @php
                    $hidden_email = preg_replace('/(.{2}).*(?=@)/', '$1************', $user->email);
                    $hidden_phone = preg_replace('/(\d)(\d+)(\d)/', '$1******' . str_repeat('*', strlen('$2')) . '$3', $user->phone);
                @endphp
                <div class="row">
                    <!-- Name -->
                    <div class="col-md-12 col-12 mb-20">
                        <x-input-label for="name" :value="__('Name')" />
                        <x-text-input id="name" name="name" class="form-control" type="text" :value="old('name', $user->name)" />
                    </div>
                    <!-- Email -->
                    <div class="col-md-12 col-12 mb-20">
                        <x-input-label for="email" :value="__('Email')" />
                        <x-text-input disabled id="email" name="email" class="form-control" type="email"
                            :value="old('email', $hidden_email)" />
                    </div>
                    <!-- Phone -->
                    <div class="col-md-12 col-12 mb-20">
                        <x-input-label for="phone" :value="__('Phone')" />
                        <x-text-input style="margin-bottom: 10px;" disabled id="phone" name="phone"
                            class="form-control" type="text" :value="old('phone', $hidden_phone)" />
                    </div>
                    <div class="col-md-12 col-12 mb-20">
                        <a class="btn btn-primary" href="{{ route('profile.phone.index') }}">Change Phone
                            Number</a>
                    </div>
                    <div class="col-md-12 col-12 mb-20">
                        <a class="btn btn-danger" href="{{ route('profile.verify') }}">Change Password</a>
                    </div>
                </div>
            </div>
        </form>
    </div>
    </div>
@endsection
