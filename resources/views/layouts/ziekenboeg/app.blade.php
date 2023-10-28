@extends('layouts.template.base')
@push('styles')
    @vite(['resources/css/ziekenboeg.scss', 'resources/js/app.js'])
@endpush

@section('header')
    <section role="alert" class="explanation no-print" aria-label="{{ __('Explanation') }}">
        <div>
            <p><span>@lang('Explanation'):</span> @lang('You are currently in the test environment.') <a href="{{ route('index') }}">@lang('Bring me back to labs')</a>.</p>
        </div>
    </section>
    <x-header logo-component="header-logo-ziekenboeg" navigation-component="header-navigation-bar-ziekenboeg" />
@endsection

@section('footer')
    <x-footer-ziekenboeg />
@endsection
