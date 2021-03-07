@extends("layouts.main")
@section("content")
    <h2>Forgot password</h2>
    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <div>Forgot your password? No problem. Just let us know your email address and we will email you a password
            reset link that will allow you to choose a new one.
        </div>

        <label for="email">Email</label>
        <input id="email" type="email" name="email" value="{{old('email')}}" required autofocus/>
        @error('email') <div class="error-msg">{{ $message }}</div> @enderror

        <input type="submit" value="Email Password Reset Link"/>
    </form>
@endsection
