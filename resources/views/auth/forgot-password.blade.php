@extends('layouts.app')

@section('title')
{{ __('Forgot Password') }}
@endsection

@section('content')
<h1 class="text-center display-5 my-5"><a href="{{ url('/') }}" class="text-decoration-none link-dark">{{ __("Forstrap") }}</a></h1>
<div class="row justify-content-center">
    <div class="col-lg-5">        
        <div class="card mb-3">
            <div class="card-header text-center">@yield('title')</div>
            <div class="card-body">            
                
                <form action="{{ route('password.request') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        {{ __('Enter your email addresss to send a password reset link.') }}
                    </div>
                    <div class="my-3">
                        <input type="email" class="form-control" id="inputEmail" name="email" placeholder="{{ __('Enter email address') }}" value="{{ old('email') }}" required>
                    </div>
                    <div class="text-center mb-3">
                        <button type="submit" class="btn btn-primary">{{ __('Send Password Reset Link') }}</button>
                    </div>
                </form>

            </div>

            <div class="card-footer text-center">
                <a href="{{ route('login') }}">{{ __('Return to login') }}</a>                
            </div>
        </div>       

        @if(count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $message)
                    <li>{{ $message }}</li>
                @endforeach
            </ul>
        </div>
        @endif 

        @if(session('status'))            
            <div class="alert alert-success">{{ __('A new password reset link has been sent to your email address.') }}</div>
        @endif
    </div>
</div>
@endsection