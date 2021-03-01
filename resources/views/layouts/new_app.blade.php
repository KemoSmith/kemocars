<!DOCTYPE html>
<html
    lang="{{ str_replace('_', '-', app()->getLocale()) }}"
    style="overflow: auto;"
>
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

        <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,700;0,900;1,300;1,400;1,700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet" />

        <!-- adsense -->
        <script data-ad-client="ca-pub-5404562133161562" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
    </head>
    <body>
        <v-app id="app" class="bg-light fontify">
            <cs-site-background>
                <cs-verify-alert
                    :email-verified="{{ auth()->user() && !auth()->user()->hasVerifiedEmail() ? 'true' : 'false' }}"
                ></cs-verify-alert>
                <form
                    id="logout-form"
                    action="{{ route('logout') }}"
                    method="POST"
                    class="d-none"
                >
                    @csrf
                </form>
                @if(auth()->user())
                <user-settings
                    user-old="{{ json_encode(App\User::with('contact_info')->find(auth()->user()->id)) }}"
                ></user-settings>
                @endif
                <cs-app-bar
                    url="{{ URL('') }}"
                    :logged-in="{{ auth()->user() ? 'true' : 'false' }}"
                    user-name="{{ auth()->user() ? auth()->user()->name : 'Guest' }}"
                    user-initial="{{ auth()->user() ? substr(auth()->user()->name, 0, 1) : 'G' }}"
                    :user-id="{{ auth()->user() ? auth()->user()->id : 0 }}"
                ></cs-app-bar>
                <cs-search-overlay></cs-search-overlay>
                <cs-filter-overlay></cs-filter-overlay>
                @if(auth()->user())
                <cs-post-vehicle-overlay></cs-post-vehicle-overlay>
                @endif
                <main class="pb-0" style="min-height: calc(100vh - 168px);">
                    @yield('content')
                </main>
                <custom-footer></custom-footer>
            </cs-site-background>
        </v-app>
    </body>
</html>
