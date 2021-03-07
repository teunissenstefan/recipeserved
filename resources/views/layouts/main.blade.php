<!doctype html>

<html lang="en">
    <head>
        @include("includes.header")
    </head>
    <body>
        <a href="{{route("home")}}"><h1>{{env("APP_NAME")}}</h1></a>
        <small>The recipe site without bloat.</small>
        <hr/>
        @yield("content")
        @include("includes.footer")
    </body>
</html>
