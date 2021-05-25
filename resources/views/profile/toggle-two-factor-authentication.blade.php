@extends('layouts.app')

@section('title')
{{ __('Toggle Two Factor Authentication') }}
@endsection

@section('content')
<h1 class="text-center display-5 my-5"><a href="{{ url('/') }}" class="text-decoration-none link-dark">{{ __("Forstrap") }}</a></h1>
<div class="row justify-content-center">
    <div class="col-lg-5">        
        <div class="card mb-3">
            <div class="card-header text-center">@yield('title')</div>
            <div class="card-body">            
                
                <form action="{{ url('user/two-factor-authentication') }}" method="POST">
                    @csrf
                    @if(auth()->user()->two_factor_secret)
                        @method('DElETE')

                        <div class="mb-5">
                            <p class="mb-3">{{ __('Scan QR Code below to get your authorization code') }}</p>
                            {!! auth()->user()->twoFactorQrCodeSvg() !!}
                        </div>
                        <div class="mb-3">
                            <p class="mb-3">{{ __('Recovery Codes') }}</p>
                            <ul>
                                @foreach(json_decode(decrypt(auth()->user()->two_factor_recovery_codes)) as $codes)
                                    <li>{{ $codes }}</li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary mb-3">{{ __('Disable') }}</button>
                        </div>
                    @else
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary my-3">{{ __('Enable') }}</button>
                        </div>
                    @endif
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
            <div class="alert alert-success">
                @if (session('status') == "two-factor-authentication-disabled")
                    {{ __('Two Factor Authentication has been disabled.') }}
                @elseif (session('status') == "two-factor-authentication-enabled")
                    {{ __('Two Factor Authentication has been enabled.') }}
                @endif
            </div>
        @endif
    </div>
</div>
@endsection