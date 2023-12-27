<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            text-align: center;
            box-sizing: border-box;
        }

        a, a:visited {
            text-decoration: none;
            color: white;
        }

        body {
            background-color: #2c2f34;
        }
    </style>
</head>
<body>
<div>
    @if (Route::has('login'))
        <div
            style="display: flex ; align-items: center ; justify-content: center; gap: 5vw; padding: 25px 0; font-size: 2rem; height: 100vh; ">
            @auth
                <a href="{{ url('/dashboard') }}">{{ auth()->user()->name }} Dashboard</a>
            @else
                <a href="{{ route('login') }}">Login</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}">Register</a>
                @endif
            @endauth
            <a href="{{ route('posts.index') }}">Posts</a>
        </div>
    @endif
</div>
</body>
</html>
