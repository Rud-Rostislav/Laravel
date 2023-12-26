<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            text-align: center;
        }

        a {
            text-decoration: none;
        }
    </style>
</head>
<body>
    <header style="margin: 0 0 50px; padding: 25px; font-size: 1.3rem; background: #2c2f34; display: flex; justify-content: center; gap: 25px">
        <a style="color: white" href="{{route('posts.index')}}">All post</a>
        <a style="color: white" href="{{route('posts.create')}}">Create post</a>
    </header>
    @yield('body')
</body>
</html>