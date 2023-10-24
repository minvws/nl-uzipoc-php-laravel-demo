@extends('layouts.guest')

@section('content')
    @if (session()->has('error'))
        <section role="alert" class="error no-print" aria-label="{{__('error') }}">
            <div>
                <p>
                    <span>{{ __('Error') }}:</span> {{ session('error') }}
                </p>
            </div>
        </section>
    @endif

    <section>
        <div class="layout-authentication">
            <h1>@lang('Login')</h1>
            <p>Welkom op de demo-omgeving.</p>
            <p>Log in via een van de beschikbare methodes om toegang te krijgen tot de beveiligde omgeving.</p>
            <ul class="external-login">
                <li><a href="{{ route('oidc.login', ['login_hint' => 'digid']) }}"><img src="{{ asset('img/login-methods/logo-digid.svg') }}" alt="DigiD logo">@lang('Login with') DigiD</a></li>
                <li><a href="{{ route('oidc.login', ['login_hint' => 'uzipas']) }}"><img src="{{ asset('img/login-methods/uzipas.png') }}" alt="UZI-Pas chip">@lang('Login with') UZI-pas</a></li>
                <li><a href="{{ route('oidc.login', ['login_hint' => 'yivi']) }}"><img src="{{ asset('img/login-methods/yivi-logo.svg') }}" alt="YIVI logo">@lang('Login with') YIVI</a></li>
                <li><a href="{{ route('oidc.login', ['login_hint' => 'oidc']) }}"><img src="{{ asset('img/login-methods/ziekenboeg.png') }}" alt="Ziekenbog logo">@lang('Login with') Ziekenboegpas</a></li>
            </ul>
        </div>
    </section>
@endsection
