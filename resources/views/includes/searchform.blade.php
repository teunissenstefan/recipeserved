<form method="GET" action="{{route("recipes.search")}}">
    <input type="text" name="q" value="{{isset($_GET['q']) ? $_GET['q'] : "" }}" placeholder="Pizza"/>
</form>
