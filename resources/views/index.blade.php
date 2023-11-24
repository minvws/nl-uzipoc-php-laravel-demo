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
            <p class="emphasized">De proeftuin is een testomgeving voor applicatiebeheerders in de zorg en leveranciers van inlogmiddelen.</p>

            <p>Door de vernieuwing van het UZI stelsel wordt het voor zorgmedewerkers mogelijk om met erkende middelen in te loggen en medische gegevens uit te wisselen. Met deze middelen kunnen identificerende kenmerken uit het UZI-register opgehaald worden.</p>
            <p>Op dit moment is het nieuwe stelsel (UZI-Online) in ontwikkeling. Geïnteresseerde partijen kunnen de werking van UZI-Online op 3 manieren testen in de proeftuin:</p>
            <ol>
                <li>Het inloggen via UZI-Online uitproberen</li>
                <li>UZI-Online als inlogmiddel voor eigen zorgapplicatie</li>
                <li>Eigen inlogmiddel koppelen aan UZI-Online</li>
            </ol>
        </div>
    </section>

    <section>
        <div>
            <h2>Zo werkt de proeftuin</h2>
            <p >Om het inloggen met UZI-Online en de aansluiting van applicaties te testen werkt de proeftuin met een eigen versie van het UZI register. In het UZI register van de proeftuin zijn 6 test zorgidentiteiten opgenomen. Om de implementatie te testen kan ingelogd worden met de gegevens van één van deze identiteiten.</p>
            <p>Het nieuwe UZI stelsel—en daarmee de proeftuin—is op dit moment in ontwikkeling en mogelijk onderhevig aan verandering van implementatiekeuzes tot het nieuwe stelsel in werking treedt. </p>
            <a href="{{ route('about') }}" class="button ghost">Lees meer over de proeftuin</a>
        </div>
    </section>

    <section class="background-color-offset">
        <div>
            <h2>Inloggen via UZI-Online uitproberen</h2>
            <p>
                In de proeftuin kun je ervaren hoe inloggen via UZI-Online gaat werken. Daartoe is een voorbeeldapplicatie ontwikkeld, genaamd ‘de Ziekenboeg’. Inloggen bij de Ziekenboeg kan met testaccounts via de middelen die op dit moment in UZI-Online beschikbaar zijn: DigiD, de UZI-pas, de Yivi wallet en een zorgspecifiek inlogmiddel.
            </p>
            <p>
                Op basis van het gebruikte testaccount wordt de data die hoort bij het account uit het proeftuin UZI register opgehaald en na inloggen getoond in de interface van de Ziekenboeg.
            </p>
            <a href="{{ route('ziekenboeg.home') }}" class="button ghost">Inloggen bij de Ziekenboeg</a>
        </div>
    </section>

    <section>
        <div>
            <h2>Aansluiten op de proeftuin</h2>
            <h3>UZI-Online als inlogmiddel voor eigen zorgapplicatie</h3>
            <p>
                De proeftuin maakt het voor softwareleveranciers mogelijk om het inloggen via UZI-Online te testen in de zorgapplicaties die zij ontwikkelen. UZI-Online is gebouwd volgens de OpenID Connect (OIDC) standaard. Omdat dit een veelgebruikte standaard is, is het relatief eenvoudig om UZI-Online toe te voegen als inlogmethode. Technische informatie is te vinden in de ‘Koppelvlakspecificatie proeftuin’ (PDF, nl).
            </p>
            <p>
                Als u de proeftuin wilt integreren in een zorgapplicatie, raadpleeg dan de ‘Aansluitdocumentatie Proeftuin voor Zorgapplicaties’ (PDF, nl).
            </p>
            <h3>Eigen inlogmiddel koppelen aan UZI-Online</h3>
            <p>
                De proeftuin maakt het voor leveranciers van (zorgspecifieke) inlogmiddelen mogelijk om aangesloten te worden op UZI-Online. Deze aansluiting kan worden getest door als inlogmiddel gekoppeld te worden aan de proeftuin. Technische informatie is te vinden in de ‘Koppelvlakspecificatie proeftuin’ (PDF, nl).
            </p>
            <p>
                Als u als leverancier van inlogmiddelen integratie in UZI-Online wilt testen, raadpleeg dan de ‘Aansluitdocumentatie Proeftuin voor Inlogmiddelen’ (PDF, nl).
            </p>
        </div>
    </section>
@endsection
