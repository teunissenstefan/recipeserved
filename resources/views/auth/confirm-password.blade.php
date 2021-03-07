@extends("layouts.main")
@section("content")
    <h2>Confirm password</h2>
    <form method="POST" action="{{ route('password.confirm') }}">
        @csrf

        <label for="password">Password</label>
        <input id="password" type="password" name="password" required autocomplete="current-password" autofocus/>
        @error('password') <div class="error-msg">{{ $message }}</div> @enderror

        <input type="submit" value="Confirm password"/>
    </form>
@endsection
