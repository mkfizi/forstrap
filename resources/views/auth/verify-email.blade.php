@extends('layouts.app')

@section('title')
{{ __('Email Verification') }}
@endsection

@section('content')
<h1 class="text-center display-5 my-5"><a href="{{ url('/') }}" class="text-decoration-none link-dark">{{ __("Forstrap") }}</a></h1>
<div class="row justify-content-center">
    <div class="col-lg-5">        
        <div class="card mb-3">
            <div class="card-header text-center">@yield('title')</div>
            <div class="card-body">            
                
                <form action="{{ route('verification.send') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        {{ __('Your account is not verified, please check your email for a verification link. If you did not receive the email, you may request a new verification link.') }}
                    </div>
                    <div class="text-center mb-3">
                        <button type="submit" class="btn btn-primary">{{ __('Resend Verification Link') }}</button>
                    </div>
                </form>

            </div>

            {{-- Since user is already logged in, route user to logout --}}
            <div class="card-footer text-center">

                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-link p-0">{{ __('Return to main page') }}</button>
                </form>
                
            </div>
        </div>       

        @if(session('status'))            
            <div class="alert alert-success">{{ __('A new verification link has been sent to your email address.') }}</div>
        @endif
    </div>
</div>
@endsection