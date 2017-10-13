<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- CSRF Token --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Backend - {{ config('app.name', 'Laravel') }}</title>

    {{-- Styles --}}
    @section('include-css')
        {{-- Bootstrap CSS --}}
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
    @show
</head>
<body>
    <div id="app">

        <nav class="navbar navbar-expand-md navbar-dark bg-dark mb-4">
            <div class="container">
                <a class="navbar-brand" href="{{ route('backend.home') }}">{{ config('app.name', 'Laravel') }}</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <ul class="navbar-nav mr-auto">
                        @if(Auth::check())
                            @include('backend::layouts.partials.nav-auth-checked')
                        @endif
                    </ul>
                    <ul class="navbar-nav mt-2 mt-md-0">
                        @if (Auth::guest())
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('backend.login') }}">@lang('backend::layout.nav.login')</a>
                            </li>

                            @if(config('backend.allow_registration') === true)
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('backend.register') }}">@lang('backend::layout.nav.register')</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ Auth::user()->name }}</a>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="{{ route('backend.logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        @lang('backend::layout.nav.logout')
                                    </a>

                                    <form id="logout-form" action="{{ route('backend.logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </div>
                            </li>
                        @endif

                    </ul>
                </div>
            </div>
        </nav>

        @yield('content')

    </div>

    {{-- Scripts --}}
    @section('include-js')
        {{-- jQuery --}}
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>

        {{-- Bootstrap JS --}}
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
    @show
</body>
</html>
