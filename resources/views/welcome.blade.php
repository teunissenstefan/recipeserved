@extends("layouts.main")
@section("content")
    <h2>Latest recipes</h2>
    @foreach($latestRecipes as $recipe)
        @include("includes.recipelink")
    @endforeach
@endsection
