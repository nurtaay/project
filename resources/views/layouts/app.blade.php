<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-dark bg-danger">
            <div class="container">
{{--                <a class="navbar-brand" href="{{ url('/') }}">--}}
{{--                    {{ config('app.name', 'Laravel') }}--}}
{{--                </a>--}}
                <a class="navbar-brand" href="#">
                    <img src="data:image/png;base64,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" alt="Logo" width="60" height="56" class="d-inline-block align-text-top">
                </a>
                <DIV class="row justify-content-center"><a class="btn btn-outline-warning" href = "{{route('posts.create')}}" >Go to create post</a>
                    <a href = "{{route('posts.index')}}" class="btn btn-outline-warning" >Go to index post</a>
                    <a href = "{{route('resumes.index')}}" class="btn btn-outline-warning" >Go to resume post</a></DIV>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>


                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->


                    <ul class="navbar-nav me-auto">
                        @isset($categories)
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('posts.index')}}">All posts</a>
                            </li>
                            @foreach($categories as $cat)
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('posts.category',$cat->id)}}">{{$cat->name}}</a>
                                </li>
                            @endforeach
                            @endisset

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login.form'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login.form') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register.form') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        @endif




        @if (session('message'))
            <div class="alert alert-success" role="alert">
                {{ session('message') }}
            </div>
        @endif

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
