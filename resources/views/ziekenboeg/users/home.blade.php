@extends('layouts.ziekenboeg.app-with-sidebar')

@php
/* @var $user \App\Models\UziUser */
@endphp

@section('sidemenu')
    <nav class="ziekenboeg-sidemenu">
        <div class="space-between">
            <div class="gaps">
                <h3>Welkom bij de Ziekenboeg</h3>

                <p>
                    De ingelogde omgeving van de Ziekenboeg.
                </p>

                <p>
                    De demo applicatie geeft aan welke gegevens  uit het proeftuin UZI register zijn opgehaald voor de testidentiteit waarmee is ingelogd.
                </p>

                <p>
                    Op basis van die gegevens kunnen zorgapplicaties identiteiten autoriseren.
                </p>
            </div>
            <div class="sticky-bottom">
                <ul>
                    <li>
                        <a href="{{ route('index') }}" class="back-to-proeftuin">
                            Terug naar de Proeftuin hoofdpagina
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
@endsection

@section('content')
    <section>
        <div>
            <h1>@lang('Ziekenboeg')</h1>
            <p>@lang('You are signed in in the employee portal of the health application!')</p>
        </div>
    </section>

    <section>
        <div>
            <h2>@lang('Data')</h2>
            <p>@lang('We received the following data from the UZI-register.')</p>
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

            <h3>@lang('Relations')</h3>
            @foreach($user->uras as $ura)
                <dl>
                    <div>
                        <dt>Naam abonee</dt>
                        <dd>{{ $ura->entityName }}</dd>
                    </div>
                    <div>
                        <dt>Abonnee nummer</dt>
                        <dd>{{ $ura->ura }}</dd>
                    </div>
                    <div>
                        <dt>Rol</dt>
                        <dd>@foreach($ura->roles as $role)
                                {{ $role->code }} ({{$role->name}})
                            @endforeach</dd>
                    </div>
                </dl>
            @endforeach
        </div>
    </section>
@endsection
