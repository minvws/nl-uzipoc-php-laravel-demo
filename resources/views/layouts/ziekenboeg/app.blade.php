@extends('layouts.template.base')
@push('styles')
    @vite(['resources/css/ziekenboeg.scss', 'resources/js/app.js'])
@endpush

@section('header')
    <x-header logo-component="header-logo-ziekenboeg" navigation-component="header-navigation-bar-ziekenboeg" />
@endsection
