<div class="no-print">
    <hr/>
    @guest
        <a href="{{route("login")}}">Login</a> -
        <a href="{{route("register")}}">Register</a> -
    @else
        <a href="{{route("dashboard")}}">Dashboard</a> -
        <form method="POST" style="display:inline" action="{{ route('logout') }}">
            @csrf
            <input type="submit" value="Log out" class="a-button">
        </form>-
    @endguest
    <a href="{{route("recipes.create")}}">Add recipe</a> -
    <a href="https://www.paypal.com/donate?hosted_button_id=UE89CGJRT3A32" target="_blank">Donate</a>
    <div style="float:right;color:gray">
        {{$totalCountRecipes}} recipes | {{$totalCountUsers}} users
    </div>
</div>
