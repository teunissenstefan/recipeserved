@extends("layouts.main",['pageTitle' => $recipe->title])
@section("content")
    <h2>{{$recipe->title}}</h2>
    <div class="no-print">
        <a href="javascript:void(0);" id="print-button" onclick="window.print();">Print recipe</a>
        @if(\Illuminate\Support\Facades\Auth::check() && \Illuminate\Support\Facades\Auth::id()==$recipe->poster_id)
            <span id="print-button-support"> - </span><a href="{{route("recipes.edit", $recipe->id)}}">Edit</a> -
            <a href="{{route("recipes.confirmdestroy", $recipe->id)}}">Delete</a>
            <script>document.getElementById("print-button-support").style.display='inline';</script>
        @endif
        <script>document.getElementById("print-button").style.display='inline';</script>
    </div>
    <p>{{$recipe->time}}</p>
    <h3>Requirements</h3>
    {!! displayWithFormatting($recipe->requirements) !!}
    <h3>Instructions</h3>
    {!! displayWithFormatting($recipe->instructions) !!}
    @if($recipe->credit)
        <small style="display: block">By {{$recipe->credit}}</small>
    @endif
@endsection
