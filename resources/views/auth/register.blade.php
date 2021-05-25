@extends('layouts.app')

@section('title')
{{ __('Register') }}
@endsection

@section('content')
<h1 class="text-center display-5 my-5"><a href="{{ url('/') }}" class="text-decoration-none link-dark">{{ __("Forstrap") }}</a></h1>
<div class="row justify-content-center">
    <div class="col-lg-5">        
        <div class="card mb-3">
            <div class="card-header text-center">@yield('title')</div>
            <div class="card-body">            
                
                <form action="{{ url('register') }}" method="POST">
                    @csrf
                    <div class="my-3">
                        <label for="inputEmail" class="form-label">{{ __('Email address') }}</label>
                        <input type="email" class="form-control" id="inputEmail" name="email" placeholder="{{ __('Enter email address') }}" value="{{ old('email') }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="inputName" class="form-label">{{ __('Name') }}</label>
                        <input type="text" class="form-control" id="inputName" name="name" placeholder="{{ __('Enter name') }}" value="{{ old('name') }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="inputPassword" class="form-label">{{ __('Password') }}</label>
                        <input type="password" class="form-control" id="inputPassword" name="password" placeholder="{{ __('Enter password') }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="inputConfirmPassword" class="form-label">{{ __('Confirm Password') }}</label>
                        <input type="password" class="form-control" id="inputConfirmPassword" name="password_confirmation" placeholder="{{ __('Confirm password') }}" required>
                    </div>                    
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary mb-3">{{ __('Register') }}</button>
                    </div>
                </form>

            </div>
            <div class="card-footer text-center">
                <a href="{{ route('login') }}">{{ __('Existing user? Login') }}</a>
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
            <div class="alert alert-success">{{ session('status') }}</div>
        @endif
    </div>
</div>
@endsection