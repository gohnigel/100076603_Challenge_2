@extends('layout')

@section('content')
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <fieldset>
            <legend>{{ __('Login') }}</legend>

            <p class="manager">* Required fields</p>

            {{-- Email of user --}}
            <p>
                <label for="email">{{ __('Email Address:') }}</label>
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                <span class="manager">*</span>

                @error('email')
                    <span class="manager" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

            <p>

            {{-- Password of user --}}
            <p>
                <label for="password">{{ __('Password:') }}</label>
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                <span class="manager">*</span>

                @error('password')
                    <span class="manager" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </p>

            <p>
                <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                <label for="remember">
                    {{ __('Remember Me') }}
                </label>
            </p>

        </fieldset>

            <p>
                <div>
                    <button type="submit" class="button">
                        {{ __('Login') }}
                    </button>

                    <button type="reset" class="button">
                        {{ __('Reset') }}
                    </button>
                </div>
            </p>

            <p>Haven't made an account? <a href="{{ route('register') }}">Click here to register</a></p>
    </form>
@endsection
