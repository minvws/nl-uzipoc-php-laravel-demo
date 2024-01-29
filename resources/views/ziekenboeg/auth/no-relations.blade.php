@extends('layouts.ziekenboeg.app')

@php
/* @var $user \App\Models\UziUser */
@endphp

@section('content')
    <section>
        <div>
            <h1>We kunnen u niet inloggen bij de Ziekenboeg.</h1>
            <p>Het inloggen in de Ziekenboeg is niet gelukt omdat er geen ziekenboegrelatie aanwezig is.</p>
            <p>We hebben de volgende gegevens voor deze testidentiteit uit het UZI-register opgehaald:</p>
        </div>
    </section>

    <section>
        <div>
            <h2>Gegevens</h2>
            <dl>
                <div>
                    <dt>Initialen</dt>
                    <dd>{{ $user->initials }}</dd>
                </div>
                <div>
                    <dt>Tussenvoegsel</dt>
                    <dd>{{ $user->surnamePrefix }}</dd>
                </div>
                <div>
                    <dt>Achternaam</dt>
                    <dd>{{ $user->surname }}</dd>
                </div>
                <div>
                    <dt>UZI-nummer</dt>
                    <dd>{{ $user->uziId }}</dd>
                </div>
                <div>
                    <dt>Level of Assurance</dt>
                    <dd>{{ $user->loaAuthn }}</dd>
                </div>
            </dl>

            <a href="{{ route('ziekenboeg.login') }}" class="button">Terug naar inloggen</a>
        </div>
    </section>
@endsection
