@extends('layouts.app')

@section('content')
<div class='uk-container uk-container-xsmall'>
<div class='uk-card'>      
<div class="uk-card-header uk-card-title">{{ __('Reset Password') }}</div>
<div class="uk-card-body">
    @if (session('status'))
        <div class="uk-alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    <form class="uk-form-horizontal" method="POST" action="{{ route('password.email') }}">
        @csrf

        <div class="uk-margin">
            <label for="email" class="uk-form-label">{{ __('E-Mail Address') }}</label>

            <div class="uk-form-controls">
                <input id="email" type="email" class="uk-input @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                @error('email')
                    <span class="uk-alert-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="uk-margin">
            <div class="uk-form-controls">
                <button type="submit" class="uk-button uk-button-primary">
                    {{ __('Send Password Reset Link') }}
                </button>
            </div>
        </div>
    </form>
</div>
</div>
</div>
@endsection
