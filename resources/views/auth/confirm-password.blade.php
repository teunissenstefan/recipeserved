@extends("layouts.main")
@section("content")
        <form method="POST" action="{{ route('password.confirm') }}">
            @csrf

            <label for="password">Password</label>

            <input id="password"
                            type="password"
                            name="password"
                            placeholder="*****"
                            required autocomplete="current-password" />


        </form>
@endsection
