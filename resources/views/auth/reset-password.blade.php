@extends("layouts.main")
@section("content")
    <h2>Reset password</h2>
    <form method="POST" action="{{ route('password.update') }}">
        @csrf

        <!-- Password Reset Token -->
        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <label for="email">Email</label>
        <input id="email" type="email" name="email" value="{{old('email')}}" required autofocus />
        @error('email') <div class="error-msg">{{ $message }}</div> @enderror

        <label for="password">Password</label>
        <input id="password"
               type="password"
               name="password"
               required autocomplete="current-password" />
        @error('password') <div class="error-msg">{{ $message }}</div> @enderror

        <label for="password_confirmation">Confirm password</label>
        <input id="password_confirmation"
               type="password"
               name="password_confirmation"
               required />
        @error('password_confirmation') <div class="error-msg">{{ $message }}</div> @enderror

        <input type="submit" value="Reset Password"/>
    </form>
@endsection
