@extends('layouts.guest')

@section('content')
    @if (session()->has('error'))
        <section role="alert" class="error no-print" aria-label="{{ __('error') }}">
            <div>
                <h4>{{ session('error') }}</h4>
                <p>{{ session('error_description') }}</p>
            </div>
        </section>
    @endif

    <section>
        <div>
            <h1>@lang('Welcome to UZI Labs')</h1>
            <p class="emphasized">@lang('On this website, you can .....')</p>
        </div>
    </section>

    <section class="background-color-offset">
        <div>
            <h2>@lang('Login')</h2>
            <p>@lang('Login using one of the options below:')</p>
            <ul class="external-login">
                <li><a href="{{ route('oidc.login', ['login_hint' => 'digid']) }}"><img src="{{ asset('img/logo_digid_rgb.svg') }}" alt="DigiD logo">@lang('Login with') DigiD</a></li>
                <li><a href="{{ route('oidc.login', ['login_hint' => 'uzipas']) }}"><img src="{{ asset('img/uzipas.png') }}" alt="UZI-Pas chip">@lang('Login with') UZI-pas</a></li>
            </ul>
        </div>
    </section>
@endsection
