@extends('layouts.app')

@section('content')
<div class='uk-container uk-container-xsmall'>
<div class='uk-card'>      
<div class="uk-card-header uk-card-title">{{ __('Login') }}</div>

<div class="uk-card-body">
    <form class="uk-form-horizontal" method="POST" action="{{ route('login') }}">
        @csrf

        <div class="uk-margin">
            <label for="email" class="uk-form-label">{{ __('E-Mail Address') }}</label>

            <div class="uk-form-controls">
                <input id="email" type="email" class="uk-input" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

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
                <input id="password" type="password" class="uk-input" name="password" required autocomplete="current-password">

                @error('password')
                    <span class="uk-alert-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="uk-margin">
            <div class="uk-form-controls">
                <input class="uk-checkbox" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                <label for="remember">
                    {{ __('Remember Me') }}
                </label>
            </div>
        </div>

        <div class="uk-margin">
            <div class="uk-form-controls">
                <button type="submit" class="uk-button uk-button-primary">
                    {{ __('Login') }}
                </button>

                @if (Route::has('password.request'))
                    <a class="" href="{{ route('password.request') }}">
                        {{ __('Forgot Your Password?') }}
                    </a>
                @endif
            </div>
        </div>
    </form>
</div>
</div>
</div>
@endsection
