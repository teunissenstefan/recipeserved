@extends("layouts.main",['pageTitle' => $recipe->title])
@section("content")
    <h2>{{$recipe->title}}</h2>
    @if(\Illuminate\Support\Facades\Auth::check() && \Illuminate\Support\Facades\Auth::id()==$recipe->poster_id)
        <a href="{{route("recipes.edit", $recipe->id)}}">Edit</a> -
        <a href="{{route("recipes.confirmdestroy", $recipe->id)}}">Delete</a>
    @endif
    <p>{{$recipe->time}}</p>
    <h3>Requirements</h3>
    {!! displayWithFormatting($recipe->requirements) !!}
    <h3>Instructions</h3>
    {!! displayWithFormatting($recipe->instructions) !!}
    @if($recipe->credit)
        <small style="display: block">By {{$recipe->credit}}</small>
    @endif
@endsection
