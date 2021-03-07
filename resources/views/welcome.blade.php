@extends("layouts.main")
@section("content")
    <h2>Search</h2>
    @include("includes.searchform")
    <h2>Latest recipes</h2>
    @foreach($latestRecipes as $recipe)
        @include("includes.recipelink")
    @endforeach
@endsection
