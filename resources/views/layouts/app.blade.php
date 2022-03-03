<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="/favicon.svg" type="image/x-icon">
    <meta name="description" content="{{ __('desc') }}">
    <meta property="og:title" content="{{ __('title') }}" />
    <meta property="og:description" content="{{ __('desc') }}" />
    <meta property="og:image" content="/favicon.svg" />
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ __('title') }}</title>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @livewireStyles
</head>
<body>
    <nav class="navbar navbar-white bg-white border-bottom">
        <div class="container">
            <a class="navbar-brand" href="{{ route('index') }}">
                {{ __('title') }}
            </a>
            <div class="ms-auto">
                @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                    <a class="text-decoration-none {{ $loop->last ? '' : 'me-1' }}" rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                        <img height="24" src="{{ '/img/' . $localeCode . '.svg' }}" alt="{{ $localeCode }}" />
                    </a>
                @endforeach
            </div>
        </div>
    </nav>
    <main class="container py-5">
        @yield('content')
    </main>
    <script defer src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" integrity="sha384-rOA1PnstxnOBLzCLMcre8ybwbTmemjzdNlILg8O7z1lUkLXozs4DHonlDtnE7fpc" crossorigin="anonymous"></script>
    @yield('script')
    @livewireScripts
</body>
</html>
