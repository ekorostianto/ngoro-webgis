@extends('layouts.app')

@section('content')
<div class='uk-container uk-container-xsmall'>
<div class='uk-card'>      
<div class="uk-card-header uk-card-title">{{ __('Verify Your Email Address') }}</div>

<div class="uk-card-body">
    @if (session('resent'))
        <div class="uk-alert-success" role="alert">
            {{ __('A fresh verification link has been sent to your email address.') }}
        </div>
    @endif

    {{ __('Before proceeding, please check your email for a verification link.') }}
    {{ __('If you did not receive the email') }},
    <form class="uk-form-horizontal uk-margin" method="POST" action="{{ route('verification.resend') }}">
        @csrf
        <button type="submit" class="uk-button uk-button-primary">{{ __('click here to request another') }}</button>.
    </form>
</div>
</div>
</div>
@endsection
