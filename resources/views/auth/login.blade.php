@extends('layouts.ziekenboeg.app')

@section('content')
    <section>
        <div class="layout-authentication">
            <h1>@lang('Login')</h1>
            <p>Welkom op de demo-omgeving van het medewerkers portaal van de Ziekenboeg.</p>
            <p>Log in via UZI-digitaal om toegang te krijgen tot de beveiligde omgeving.</p>
            <ul class="external-login">
                <li><a href="{{ route('oidc.login') }}">@lang('Login with') UZI-digitaal</a></li>
            </ul>
        </div>
    </section>
@endsection
