<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>@yield('title')</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{asset('assets/img/favicon.png')}}" rel="icon">
    <link href="{{asset('assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Jost:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{'assets/vendor/aos/aos.css'}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{asset('assets/css/styless.css')}}" rel="stylesheet">

    <!-- =======================================================
    * Template Name: Arsha - v4.9.1
    * Template URL: https://bootstrapmade.com/arsha-free-bootstrap-html-template-corporate/
    * Author: BootstrapMade.com
    * License: https://bootstrapmade.com/license/
    ======================================================== -->
</head>

<body>
<!-- ======= Header ======= -->
<header id="header" class="fixed-top " style="background: #37517e;">
    <div class="container d-flex align-items-center">
        <h1 class="logo me-auto"><a href="{{asset('index.html')}}">Anywork</a></h1>
        <nav id="navbar" class="navbar">
            <ul>
                <li><a class="nav-link scrollto active" href="{{route('posts.index')}}">Home</a></li>
                <li><a class="nav-link scrollto" href="#about">Vacancy</a></li>
                <li><a class="nav-link scrollto" href="#team">Team</a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Category</a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        @isset($categories)
                            @foreach($categories as $cat)
                                <li>
                                    <a class="dropdown-item"
                                       href="{{ route('posts.vacancy', $cat->id) }}">{{$cat->name}}</a>
                                </li>
                            @endforeach
                        @endisset
                    </ul>
                </li>
                <ul>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarDropdown1" data-bs-toggle="dropdown" aria-expanded="false">Languages</a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown1">
                                @foreach(config('app.languages') as $ln => $lang)
                                    <a style="color: black" href="{{route('switch.lang', $ln)}}">
                                        {{$lang}}
                                    </a>
                                @endforeach
                        </ul>
                    </li>
                </ul>
                <li><a class="nav-link scrollto" href="#contact">Contact</a></li>

                <ul class="nav-link">
                    @guest
                        @if (Route::has('login.form'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login.form') }}">{{ __('Login') }}</a>
                            </li>
                        @endif

                        @if (Route::has('register.form'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register.form') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="dropdown">
                            <a id="navbarDropdown" href="{{route('user.profile')}}" class="nav-link dropdown-toggle" role="button"
                               data-bs-toggle="dropdown"
                               aria-haspopup="true" aria-expanded="false" v-pre>
                                Profile
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown" style="width: 250px;">
                                {{ Auth::user()->name }}
                                <a  style="color: black" class="nav-link" href="{{route('user.profile')}}">Profile</a>
                                <a  style="color: black" class="nav-link" href="{{route('posts.create')}}">Job</a>
                                <a  style="color: black" class="nav-link" href="{{route('resumes.index')}}">Resumes</a>
                                <a  style="color: black; width: 150px; border-radius: 10px" class="" href="{{ route('logout') }}"
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

                <li><a class="getstarted scrollto" href="#about">Get Started</a></li>
                <li style="margin-left: 50px"><img src="{{asset(Auth::user()->avatar)}}" style="width: 70px; height: 70px; border-radius: 50px" class="nav-profile-img"></li>
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->

    </div>
</header>
<!-- End Header -->
<div>
@yield('content')
</div>

<div id=""></div>
<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<!-- Vendor JS Files -->
<script src="{{asset('assets/vendor/aos/aos.js')}}"></script>
<script src="{{'assets/vendor/bootstrap/js/bootstrap.bundle.min.js'}}"></script>
<script src="{{'assets/vendor/glightbox/js/glightbox.min.js'}}"></script>
<script src="{{'assets/vendor/isotope-layout/isotope.pkgd.min.js'}}"></script>
<script src="{{asset('assets/vendor/swiper/swiper-bundle.min.js')}}"></script>
<script src="{{'assets/vendor/waypoints/noframework.waypoints.js'}}"></script>
<script src="{{'assets/vendor/php-email-form/validate.js'}}"></script>

<!-- Template Main JS File -->
<script src="{{asset('assets/js/main.js')}}"></script>

</body>

</html>
