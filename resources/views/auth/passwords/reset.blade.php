@extends('layouts.app')

@section('content')
<div class='uk-container uk-container-xsmall'>
<div class='uk-card'>  
<div class="uk-card-header uk-card-title">{{ __('Reset Password') }}</div>
<div class="uk-card-body">
    <form class="uk-form-horizontal" method="POST" action="{{ route('password.update') }}">
        @csrf

        <input type="hidden" name="token" value="{{ $token }}">

        <div class="uk-margin">
            <label for="email" class="uk-form-label">{{ __('E-Mail Address') }}</label>

            <div class="uk-form-controls">
                <input id="email" type="email" class="uk-input @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                @error('email')
                    <span class="uk-alert-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="uk-margin">
            <label for="password" class="uk-form-label">{{ __('Password') }}</label>

            <div class="uk-form-controls">
                <input id="password" type="password" class="uk-input @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                @error('password')
                    <span class="uk-alert-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="uk-margin">
            <label for="password-confirm" class="uk-form-label">{{ __('Confirm Password') }}</label>

            <div class="uk-form-controls">
                <input id="password-confirm" type="password" class="uk-input" name="password_confirmation" required autocomplete="new-password">
            </div>
        </div>

        <div class="uk-margin">
            <div class="uk-form-controls">
                <button type="submit" class="uk-button uk-button-primary">
                    {{ __('Reset Password') }}
                </button>
            </div>
        </div>
    </form>
</div>
</div>
</div>
@endsection
