@extends("layouts.main")
@section("content")
    <h2>Login</h2>
    <form method="POST" action="{{ route('login') }}">
        @csrf

        <label for="email">Email</label>
        <input id="email" type="email" name="email" value="{{old('email')}}" required autofocus />
        @error('email') <div class="error-msg">{{ $message }}</div> @enderror

        <label for="password">Password</label>
        <input id="password"
                        type="password"
                        name="password"
                        required autocomplete="current-password" />
        @error('password') <div class="error-msg">{{ $message }}</div> @enderror

        <label for="remember_me">
            <input id="remember_me" type="checkbox" name="remember">
            <span>Remember me</span>
        </label>

        <input type="submit" value="Log in"/>

        @if (Route::has('password.request'))
            <a href="{{ route('password.request') }}">Forgot your password?</a>
        @endif
    </form>
@endsection
