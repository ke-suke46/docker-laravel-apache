@extends('layouts.login_app')

@section('css')
<style>
    header {
        height: 50px;
        background-color: rgb(92, 68, 2);
        color: white;
        padding-left: 20px;
        font-size: large;
    }

    .title {
        top: 10px;
        padding: 10px 7px 0px 0px;
    }

    .card {
        margin-top: 40px;
    }

    .left {
        width: 70%;
    }

    
</style>
@endsection


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Verify Your Email Address') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif

                    {{ __('Before proceeding, please check your email for a verification link.') }}
                    {{ __('If you did not receive the email') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
