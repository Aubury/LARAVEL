<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title-page')</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/all.css') }}" rel="stylesheet">
    @yield('style')

    <!-- Scripts -->
{{--    <script src="https://unpkg.com/vue"></script>--}}

</head>
<body>
<div class="full_container">

    <header class="f-col">
        @include('inc.adminHeader')
    </header>
    <navigation class="w-100 bg-dark">
        @yield('navigation')
    </navigation>
    <main class="container-fluid py-4" id="app">
        @yield('content')
    </main>
    <footer>
        @include('inc.footer')
    </footer>
    <!-- Scripts -->
    <script type="text/javascript"  src="{{asset('js/manifest.js')}}"></script>
    <script type="text/javascript"  src="{{asset('js/vendor.js')}}"></script>
    <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
    @yield('scripts')
</div>
</body>
</html>

