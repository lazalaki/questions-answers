<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>App</title>

        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        @vite(['resources/scss/app.scss'])
    </head>
    </head>
    <body>
        @if(auth()->user())
            <a href="{{ route('logout') }}"><button type="button" class="btn logout-button">Logout</button></a>
        @endif
        @yield('content')
    </body>
</html>
