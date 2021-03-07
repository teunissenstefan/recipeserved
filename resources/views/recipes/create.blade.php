@extends("layouts.main")
@section("content")
    <h2>Add recipe</h2>
    <form method="POST" action="{{ route('recipes.store') }}">
        @csrf

        <label for="title">Title</label>
        <input id="title" type="text" name="title" value="{{old('title')}}" placeholder="Brigadeiros" required autofocus />
        @error('title') <div class="error-msg">{{ $message }}</div> @enderror

        <label for="time">Time</label>
        <input id="time" type="text" name="time" value="{{old('time')}}" placeholder="15 minutes" required />
        @error('time') <div class="error-msg">{{ $message }}</div> @enderror

        <label for="requirements">Requirements</label>
        @include("includes.formattinghelplink")
        <textarea name="requirements" id="requirements" placeholder="Butter and flour" required>{{old('requirements')}}</textarea>
        @error('requirements') <div class="error-msg">{{ $message }}</div> @enderror

        <label for="instructions">Instructions</label>
        @include("includes.formattinghelplink")
        <textarea name="instructions" id="instructions" placeholder="Mix it all together" required>{{old('instructions')}}</textarea>
        @error('instructions') <div class="error-msg">{{ $message }}</div> @enderror

        <label for="credit">Credit (optional)</label>
        <input id="credit" type="text" name="credit" placeholder="Luke Smith" value="{{old('credit')}}" />
        @error('credit') <div class="error-msg">{{ $message }}</div> @enderror

        <input type="submit" value="Add recipe"/>
    </form>
@endsection
