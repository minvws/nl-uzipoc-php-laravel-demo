<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="robots" content="noindex,nofollow">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', '') }}</title>
    <link rel="preload" href="{{ asset('img/ro-logo.svg') }}" as="image">
    <link href="{{ asset('img/favicon.ico') }}" rel="shortcut icon">
    @stack('styles')
</head>
<body>
@yield('header')
<main id="main-content" tabindex="-1">
    @yield('content')
</main>

<x-footer />
@stack('scripts')
</body>
</html>
