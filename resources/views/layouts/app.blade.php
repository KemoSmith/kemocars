<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}" />

        <title>{{ config("app.name", "Laravel") }}</title>

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com" />
        <link
            href="https://fonts.googleapis.com/css?family=Nunito"
            rel="stylesheet"
        />

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet" />
    </head>
    <body >
        <v-app id="app">
            {{--
            <nav
                class="navbar navbar-expand-md navbar-light bg-white shadow-sm"
            >
                <div class="container">
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config("app.name", "Laravel") }}
                    </a>
                    <button
                        class="navbar-toggler"
                        type="button"
                        data-toggle="collapse"
                        data-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent"
                        aria-expanded="false"
                        aria-label="{{ __('Toggle navigation') }}"
                    >
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div
                        class="collapse navbar-collapse"
                        id="navbarSupportedContent"
                    >
                        <!-- Left Side Of Navbar -->
                        <ul class="navbar-nav mr-auto"></ul>

                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ml-auto">
                            <!-- Authentication Links -->
                            @guest
                            <li class="nav-item">
                                <a
                                    class="nav-link"
                                    href="{{ route('login') }}"
                                    >{{ __("Login") }}</a
                                >
                            </li>
                            @if (Route::has('register'))
                            <li class="nav-item">
                                <a
                                    class="nav-link"
                                    href="{{ route('register') }}"
                                    >{{ __("Register") }}</a
                                >
                            </li>
                            @endif @else
                            <li class="nav-item dropdown">
                                <a
                                    id="navbarDropdown"
                                    class="nav-link dropdown-toggle"
                                    href="#"
                                    role="button"
                                    data-toggle="dropdown"
                                    aria-haspopup="true"
                                    aria-expanded="false"
                                    v-pre
                                >
                                    {{ Auth::user()->name }}
                                </a>

                                <div
                                    class="dropdown-menu dropdown-menu-right"
                                    aria-labelledby="navbarDropdown"
                                >
                                    <a
                                        class="dropdown-item"
                                        href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"
                                    >
                                        {{ __("Logout") }}
                                    </a>

                                    <form
                                        id="logout-form"
                                        action="{{ route('logout') }}"
                                        method="POST"
                                        class="d-none"
                                    >
                                        @csrf
                                    </form>
                                </div>
                            </li>
                            @endguest
                        </ul>
                    </div>
                </div>
            </nav>
            --}}

            <div
                style="height: 56px; z-index: 15;"
                class="mb-0 sticky-top"
            >
                <v-toolbar color="blue-grey darken-4" flat short dark>
                    <a href="{{ URL('') }}" class="text-decoration-none"
                        ><v-btn icon class="m-0">
                            <v-icon>mdi-home</v-icon>
                        </v-btn></a
                    >
                    <v-divider class="my-0 mx-4" vertical dark></v-divider>
                    <a href="{{ URL('') }}" class="text-decoration-none">
                        <v-toolbar-title class="text-white">
                            KemoCars
                        </v-toolbar-title></a
                    >

                    <v-spacer></v-spacer>
                    <form action="{{ URL('vehicle/search') }}" method="GET" class="w-50">
                        <v-text-field
                            dense
                            outlined
                            class="mt-6"
                            color="pink"
                            label="Search"
                            name="search_term"
                            type="search"
                            value="{{ request('search_term') }}"
                        ></v-text-field>
                    </form>
                    <v-spacer></v-spacer>
                    <a
                        href="{{ URL('vehicle/create') }}"
                        class="text-decoration-none"
                        ><v-btn text>List A Vehicle</v-btn></a
                    >
                    <v-divider class="my-0 mx-4" vertical dark></v-divider>
                    @if(auth()->user())
                    <v-subheader>{{ auth()->user()->name }}</v-subheader>
                    @else
                    <v-subheader>Guest</v-subheader>
                    @endif
                    <v-avatar
                        color="blue-grey"
                        >{{ auth()->user() ? substr(auth()->user()->name, 0, 1) : 'G' }}</v-avatar
                    >
                </v-toolbar>
            </div>

            <main class="pb-0">
                <div class="w-100 d-flex justify-content-center">
                    <div class="col-12 p-0">
                        @yield('content')
                    </div>
                </div>
            </main>

            <custom-footer></custom-footer>
        </v-app>
    </body>
</html>
