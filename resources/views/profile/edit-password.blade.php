@extends('layouts.app')

@section('title')
{{ __('Edit Password') }}
@endsection

@section('content')
<h1 class="text-center display-5 my-5"><a href="{{ url('/') }}" class="text-decoration-none link-dark">{{ __("Forstrap") }}</a></h1>
<div class="row justify-content-center">
    <div class="col-lg-5">        
        <div class="card mb-3">
            <div class="card-header text-center">@yield('title')</div>
            <div class="card-body">            
                
                <form action="{{ route('user-password.update') }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="inputPassword" class="form-label">{{ __('Current password') }}</label>
                        <input type="password" class="form-control" id="inputCurrentPassword" name="current_password" placeholder="{{ __('Enter current password') }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="inputPassword" class="form-label">{{ __('New Password') }}</label>
                        <input type="password" class="form-control" id="inputPassword" name="password" placeholder="{{ __('Enter new password') }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="inputConfirmPassword" class="form-label">{{ __('Confirm New Password') }}</label>
                        <input type="password" class="form-control" id="inputConfirmPassword" name="password_confirmation" placeholder="{{ __('Confirm new password') }}" required>
                    </div>  
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary mb-3">{{ __('Update Password') }}</button>
                    </div>
                </form>

            </div>
            <div class="card-footer text-center">
                <a href="{{ route('home') }}">{{ __('Return to home page') }}</a>
            </div>
        </div>

        @if($errors->hasBag('updatePassword'))
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->updatePassword->all() as $message)
                    <li>{{ $message }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        @if(session('status'))            
            <div class="alert alert-success">{{ __('Your password has been updated.') }}</div>
        @endif
    </div>
</div>
@endsection