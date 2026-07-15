<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{csrf_token()}}">
    <link rel="icon" href="{{asset('imgs/favicon.png')}}">
    <title>BoolBinge - BackOffice</title>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <!-- Vite -->
    @vite(['resources/js/app.js'])
</head>

<body class="bg-body-tertiary">
<div id="app">
    {{-- HEADER --}}
    <header>
        {{-- Nav --}}
        <nav class="navbar navbar-expand-md shadow-sm navbar-dark bg-dark">
            <div class="container">
                {{-- brand --}}
                <a class="navbar-brand d-flex align-items-center" href="{{url('/')}}">
                    <img class="img-fluid" src="{{asset('imgs/boolbinge-nobackground.png')}}" alt="nav-brand">
                </a>
                {{-- toggler --}}
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{__('Toggle navigation')}}">
                    <span class="navbar-toggler-icon"></span>
                </button>
                {{-- links --}}
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- left nav -->
                    <ul class="navbar-nav me-auto align-items-md-baseline">
                        <li class="nav-item fs-5"><a class="nav-link" href="{{url('/')}}">Dashboard</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{url('/contents')}}">Content</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{url('/genres')}}">Genres</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{url('/performers')}}">Performers</a></li>
                    </ul>
                    <!-- right nav -->
                    <ul class="navbar-nav ml-auto">
                        <!-- auth links -->
                        @guest
                        <li class="nav-item"><a class="nav-link" href="{{route('login')}}">Login</a></li>
                        @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{Auth::user()->name}}</a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{url('profile')}}">Profile</a>
                                <a class="dropdown-item" href="{{route('logout')}}" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">Logout</a>
                                <form id="logout-form" action="{{route('logout')}}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    {{-- MAIN --}}
    <main>
        @yield('content')
    </main>
</div>
</body>
</html>
