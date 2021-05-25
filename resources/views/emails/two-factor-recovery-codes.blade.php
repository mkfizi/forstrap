{{-- Using email layout from mail vendor --}}
@component('mail::message') 
<h1>{{ __("Hello") }}</h1>
<p>{{  __("You are receiving this email because we received a request for your recovery codes. Your recovery code are:") }}</p>
<ul>
    @foreach (json_decode(decrypt($user->two_factor_recovery_codes)) as $codes)
        <li>{{ $codes }}</li>
    @endforeach
</ul>

{{ __('Regards,') }}<br>
Forstrap
@endcomponent