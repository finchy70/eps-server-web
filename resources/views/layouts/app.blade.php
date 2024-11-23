<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>EPS Inspect | @yield('title')</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.3.5/dist/alpine.min.js" defer></script>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    @livewireStyles
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @yield('styles')

</head>
<body class="bg-gray-300">
    <div id="app">
        @isset($users_not_autthed)
            <x-nav-bar :unauthorisedUsers="$users_not_authed" />
        @else
            <x-nav-bar :unauthorisedUsers="collect()" />
        @endisset
        @if(Session::has('success') || Session::has('message') || count($errors) > 0)
            <x-user-alert/>
        @endif
        <main class="px-8 md:px-16 lg:px-24 py-4">
            @yield('content')
        </main>
    </div>
    @livewireScripts
    <script src="https://cdn.jsdelivr.net/gh/livewire/sortable@v0.x.x/dist/livewire-sortable.js"></script>
    @yield('scripts')
</body>

</html>
