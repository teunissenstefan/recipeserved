@extends("layouts.main")
@section("content")
    <h2>Search results ({{$countRecipes}})</h2>
    @include("includes.searchform")
    @foreach($recipes as $recipe)
        @include("includes.recipelink")
    @endforeach
    {{ $recipes->links() }}
@endsection
