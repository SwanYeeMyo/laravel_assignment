<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        @vite('resources/css/app.css')

        
    </head>
<body>
    <h3 class="text-center bg-slate-400">This is laravel with Tailwind Css .</h3>
    <div class="flex justify-center items-center">
        <a href="{{route('login')}}">Login</a>
        {{-- <a href="{{route('register')}}">Register</a> --}}

    </div>
</body>
</html>
