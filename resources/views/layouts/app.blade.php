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
    <body>
        <v-app id="app" class="bg-light">
            <div style="height: 56px; z-index: 15;" class="mb-0 sticky-top">
                <v-toolbar color="#3474eb" flat short dark>
                    <a href="{{ URL('') }}" class="text-decoration-none"
                        ><v-btn icon class="m-0">
                            <v-icon>mdi-home</v-icon>
                        </v-btn></a
                    >
                    <v-divider class="my-0 mx-4" vertical dark></v-divider>
                    <a href="{{ URL('') }}" class="text-decoration-none">
                        <v-toolbar-title class="text-white">
                            Carvidor
                        </v-toolbar-title></a
                    >

                    <v-spacer></v-spacer>
                    <form
                        action="{{ URL('vehicle/search') }}"
                        method="GET"
                        class="w-50"
                    >
                        <v-text-field
                            dense
                            outlined
                            class="mt-6"
                            color="white"
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
                    <form
                        id="logout-form"
                        action="{{ route('logout') }}"
                        method="POST"
                        class="d-none"
                    >
                        @csrf
                    </form>
                    <user-avatar-menu
                        url="{{ URL('') }}"
                        logged-in="{{ auth()->user() ? 'true' : 'false' }}"
                        user-name="{{ auth()->user() ? auth()->user()->name : 'Guest' }}"
                        user-initial="{{ auth()->user() ? substr(auth()->user()->name, 0, 1) : 'G' }}"
                    ></user-avatar-menu>
                </v-toolbar>
            </div>

            <main class="pb-0">
                @if(auth()->user())
                <form
                    action="{{ URL('user/' . auth()->user()->id) }}"
                    method="POST"
                >
                    @csrf @method('PATCH')
                    <user-settings
                        user-old="{{ json_encode(App\User::with('contact_info')->find(auth()->user()->id)) }}"
                    ></user-settings>
                </form>
                @endif
                <div class="w-100 d-flex justify-content-center">
                    <div class="col-12 p-0">
                        @yield('content')
                    </div>
                </div>
            </main>
        </v-app>
    </body>
</html>
