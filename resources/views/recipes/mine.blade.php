@extends("layouts.main")
@section("content")
    <h2>My recipes ({{$countMyRecipes}})</h2>
    @foreach($recipes as $recipe)
        @include("includes.recipelink")
    @endforeach
@endsection
