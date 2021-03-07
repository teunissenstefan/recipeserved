@extends("layouts.main")
@section("content")
    <h2>Delete recipe</h2>
    Are you sure you want to delete <b><a href="{{route("recipes.show", $recipe->id)}}">{{$recipe->title}}</a></b>?
    <form method="POST" action="{{ route('recipes.destroy', $recipe->id) }}">
        @csrf
        @method("DELETE")
        <input type="submit" value="Yes, delete recipe"/>
    </form>
@endsection
