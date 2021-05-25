@extends('layouts.app')

@section('title')
{{ __('Edit Profile') }}
@endsection

@section('content')
<h1 class="text-center display-5 my-5"><a href="{{ url('/') }}" class="text-decoration-none link-dark">{{ __("Forstrap") }}</a></h1>
<div class="row justify-content-center">
    <div class="col-lg-5">        
        <div class="card mb-3">
            <div class="card-header text-center">@yield('title')</div>
            <div class="card-body">            
                
                <form action="{{ route('user-profile-information.update') }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="my-3">
                        <label for="inputName" inputEmail="form-label">{{ __('Enter new email') }}</label>
                        <input type="email" class="form-control" id="inputEmail" name="email" placeholder="{{ __('Enter new email address') }}" value="{{ Auth::user()->email }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="inputName" class="form-label">{{ __('Enter new name') }}</label>
                        <input type="text" class="form-control" id="inputName" name="name" placeholder="{{ __('Enter new name') }}" value="{{ Auth::user()->name }}" required>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary mb-3">{{ __('Update Profile') }}</button>
                    </div>
                </form>

            </div>
            <div class="card-footer text-center">
                <a href="{{ route('home') }}">{{ __('Return to home page') }}</a>
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
            <div class="alert alert-success">{{ __('Your profile has been updated.') }}</div>
        @endif
    </div>
</div>
@endsection