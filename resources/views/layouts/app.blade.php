<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    @include('layouts.includes.css')

    @yield('css')

</head>

<body class="background-light">
    
    {{-- Loader --}}
    @include('layouts.includes.loader')

    {{-- Menu section --}}
    @include('layouts.includes.header')

    <!-- main section -->
    @yield('content')
    <!-- //main section -->


    {{-- Footer section --}}
    @include('layouts.includes.footer')

    @include('layouts.includes.js')
    
    @yield('js')

</body>

</html>