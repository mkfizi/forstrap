@extends('layouts.app')

@section('title')
{{ __('Home') }}
@endsection

@section('content')
<h1 class="text-center display-5 my-5"><a href="{{ url('/') }}" class="text-decoration-none link-dark">{{ __("Forstrap") }}</a></h1>
<div class="row justify-content-center">
    <div class="col-lg-5">        
        <div class="card mb-3">
            <div class="card-header text-center">@yield('title')</div>
            <div class="card-body">          
                <p class="my-3">{{ __('Greetings, ') }}{{ Auth::user()->name }}</p>  
                <a href="{{ route('profile.edit') }}" class="d-block">{{ __('Edit profile')}}</a>
                <a href="{{ route('password.edit') }}" class="d-block">{{ __('Edit password')}}</a>
                <a href="{{ route('two-factor-authentication.toggle') }}" class="d-block mb-3">{{ __('Toggle two factor authentication')}}</a>
            </div>
            <div class="card-footer text-center">

                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-danger">{{ __('Logout') }}</button>
                </form>

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