<!doctype html>

<html lang="en">
    <head>
        @include("includes.header")
    </head>
    <body>
        <div class="no-print">
            <a href="{{route("home")}}"><h1>{{env("APP_NAME")}}</h1></a>
            <small>The recipe site without bloat.</small>
            <hr/>
        </div>
        @yield("content")
        @include("includes.footer")
    </body>
</html>
