<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!--CSRF Token-->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title','kinanobbs')--基于Laravel5.5的BBS系统</title>
    {{--<meta name="description" content="@yield('description','KinanoBBS')" />--}}
    <meta name="description" content="@yield('description', setting('seo_description', 'kinano'))" />
    <meta name="keyword" content="@yield('keyword', setting('seo_keyword', 'kinano'))" />
    <!--Style-->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @yield('styles')
</head>
<body>
    <div id="app" class="{{ route_class() }}-page">

        @include('layouts._header')

        <div class="container">

            @include('layouts._message')
            @yield('content')

        </div>

        @include('layouts._footer')
    </div>
    @if(app()->isLocal())
        @include('sudosu::user-selector')
        @endif

    <!--Script-->
    <script src="{{ asset('js/app.js') }}"></script>
    @yield('scripts')
</body>
</html>