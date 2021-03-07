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
    <a href="{{route("recipes.create")}}">Add recipe</a>
    <div style="float:right;color:gray">
        {{$totalCountRecipes}} recipes | {{$totalCountUsers}} users
    </div>
</div>
