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

        a, a:visited {
            text-decoration: none;
        }

        .link {
            background: #1f2937;
            color: white;
            padding: 10px;
            border-radius: 10px;
            width: 35%;
            margin: 0 auto;
            font-size: 1.25rem;
            border: none;
        }

        header {
            padding: 25px;
            font-size: 1.5rem;
            background: #2c2f34;
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 50px;
            height: 5vh;
        }

        header a {
            color: white !important;
        }

        .post-wrapper {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 50px;
            padding: 25px 0
        }

        .post {
            width: 25vw;
            min-height: 30vh;
            transition: 0.5s;
            box-shadow: #000000 0 0 5px -2px;
            border-radius: 25px;
            padding: 25px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            gap: 25px;
        }

        .mt-25 {
            margin-top: 25px;
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 25px;
            margin: 0 auto;
            padding: 25px;
            justify-content: center;
        }

        .form-create-edit {
            width: 25vw;
            min-height: 84vh;
        }

        .input-textarea {
            padding: 10px;
            border-radius: 10px;
            font-size: 1.25rem;
            border: none;
            width: 100%;
            box-shadow: #000000 0 0 5px -2px;
        }

        textarea {
            resize: none;
            min-height: 30vh;
        }
    </style>
</head>
<body>
<header>
    <a href="{{url('/')}}">Main</a>
    <a href="{{route('posts.index')}}">All post</a>
    @if( Auth::check())
        <a href="{{route('posts.create')}}">Create post</a>
        <p style="color: white">Hello, {{Auth::user()->name}}. @if( Auth::user()->is_admin)
                You are Admin!
            @endif</p>
    @else
        <a href="{{route('login')}}">Login</a>
        <a href="{{route('register')}}">Register</a>
    @endif
</header>
@yield('body')
</body>
</html>
