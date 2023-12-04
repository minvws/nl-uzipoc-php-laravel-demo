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
            <p class="emphasized">De proeftuin is een omgeving voor platform- en middelenleveranciers om aansluiting op UZI-Online te testen.</p>

            <p>Door de vernieuwing van het UZI-stelsel wordt het voor zorgmedewerkers mogelijk om met erkende inlogmiddelen in te loggen en medische gegevens uit te wisselen. Met deze middelen kunnen identificerende kenmerken uit het UZI-register opgehaald worden.</p>
            <p>Op dit moment is het nieuwe stelsel (werknaam: UZI-Online) in ontwikkeling. Geïnteresseerde partijen kunnen het inloggen via UZI-Online op de proeftuin uitproberen en op 2 manieren aansluiten:</p>
            <p>Route 1: Aansluiten als platformleverancier<br>Route 2: Aansluiten als middelenleverancier
            </p>
        </div>
    </section>

    <section>
        <div>
            <h2>Zo werkt de proeftuin</h2>
            <p>Om het inloggen met de huidige versie van UZI-Online en de aansluiting van applicaties en middelen te testen werkt de proeftuin met een eigen versie van het UZI-register. In het UZI-register van de proeftuin zijn test zorgidentiteiten opgenomen.</p>
            <p>Het nieuwe stelsel is nog in ontwikkeling. Daarmee verandert ook de proeftuin de komende tijd. Op die manier testen we samen wat het beste werkt.</p>
            <a href="{{ route('about') }}" class="button ghost">Lees meer over de proeftuin</a>
        </div>
    </section>

    <section class="background-color-offset">
        <div>
            <h2>Inloggen via UZI-Online uitproberen</h2>
            <p>
                In de proeftuin kunt u ervaren hoe inloggen via UZI-Online gaat werken. We hebben daarom als voorbeeld ‘De Ziekenboeg’ gemaakt. Inloggen bij de Ziekenboeg kan met een testidentiteit of de inlogmiddelen die beschikbaar zijn in de proeftuin.
            </p>
            <p>
                Op basis van de identiteit waarmee wordt ingelogd wordt de data die hoort bij de identiteit uit het proeftuin UZI-register opgehaald en na inloggen getoond in de interface van de Ziekenboeg.
            </p>
            <a href="{{ route('ziekenboeg.home') }}" class="button ghost">Inloggen bij de Ziekenboeg</a>
        </div>
    </section>

    <section>
        <div>
            <h2>Aansluiten op de proeftuin</h2>
            <h3>Route 1: Aansluiten als platformleverancier</h3>
            <p>
                De proeftuin maakt het voor platformleveranciers mogelijk om het inloggen via UZI-Online te testen vanuit de applicaties die zij ontwikkelen. UZI-Online is gebouwd volgens de OpenID Connect (OIDC) standaard, waardoor aansluiten relatief eenvoudig is. Technische informatie is te vinden in de ‘Koppelvlakspecificatie proeftuin’ (PDF, nl).
            </p>
            <p>
                Voor het koppelen van een zorgplatform met UZI-Online, raadpleeg de ‘Aansluitdocumentatie voor Platformleveranciers (PDF, nl).
            </p>
            <h3>Route 2: Aansluiten als middelenleverancier</h3>
            <p>
                De proeftuin maakt het voor leveranciers van (zorgspecifieke) inlogmiddelen mogelijk om aangesloten te worden op UZI-Online. Deze aansluiting kan vervolgens in ‘De Ziekenboeg’ worden getest. Technische informatie is te vinden in de ‘Koppelvlakspecificatie proeftuin’ (PDF, nl).
            </p>
            <p>
                Voor het koppelen van een inlogmiddel aan UZI-Online, raadpleeg de ‘Aansluitdocumentatie voor Middelenleveranciers (PDF, nl).
            </p>
        </div>
    </section>
@endsection
