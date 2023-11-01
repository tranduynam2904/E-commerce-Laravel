@extends('client.layout.master')
@section('main')
    <div style="margin: 0 auto;" class="col-sm-12 col-md-12 col-xs-12 col-lg-5 mb-30">

        <div class="login-form">
            <h4 style="font-size: 1.5rem; text-align: center" class="login-title">Verify </h4>
            <h6 style="font-size: 1rem" class="login-title"> To increase the security of your account, verify your information using one of the
                following
                methods.</h6>
            <div class="row">
                <div style="text-align: center" class="col-md-12 col-12 mb-20">
                    <a href="{{ route('profile.verify-password') }}" class="btn btn-primary">Password Verify</a>
                </div>
                <div style="text-align: center" class="col-md-12 col-12 mb-20">
                    <a class="btn btn-primary" href="">Phone Verify</a>
                </div>
            </div>
        </div>
    </div>
@endsection
