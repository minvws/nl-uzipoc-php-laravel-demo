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
            <h1>@lang('About') @lang('UZI Labs')</h1>
            <p class="emphasized">De proeftuin is een testomgeving voor applicatiebeheerders in de zorg en leveranciers van inlogmiddelen.</p>

            <p>In de proeftuin kan het nieuwe UZI-stelsel dat we ontwikkelen worden getest. Platform- en Middelenleveranciers kunnen ervaren hoe inloggen via UZI-Online werkt en kunnen zelf aan de slag om een aansluiting op UZI-Online te maken.</p>
            <p>De proeftuin is ontwikkeld door het Ministerie van Volksgezondheid, Welzijn en Sport. Het nieuwe stelsel is nog in ontwikkeling. Daarmee verandert ook de proeftuin de komende tijd. Op die manier testen we samen wat het beste werkt. Ondersteuning en onderhoud van de proeftuin geschiedt op best effort tijdens kantooruren.</p>
        </div>
    </section>

    <section>
        <div>
            <h2>Versiegeschiedenis</h2>
            <p>De laatste update van de proeftuin was op 04-12-2024.</p>
            <table class="version-history">
                <caption>Versieoverzicht:</caption>
                <thead>
                <tr>
                    <th scope="col" class="version-history-version-number">Versienummer</th>
                    <th scope="col" class="version-history-date">Toegepast op</th>
                    <th scope="col" class="version-history-changes">Wijzigingen</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>v1.0.0</td>
                    <td>04-12-2023</td>
                    <td>Eerste release proeftuin</td>
                </tr>
                </tbody>
            </table>
        </div>
    </section>

    <section class="background-color-offset">
        <div>
            <h2>Privacy</h2>
            <p>
                In de <a href="https://www.rijksoverheid.nl/ministeries/ministerie-van-volksgezondheid-welzijn-en-sport/privacy">privacyverklaring van het Ministerie van Volksgezondheid, Welzijn en Sport</a> is te lezen hoe VWS omgaat met gegevensbescherming.
            </p>
            <p>
                In de proeftuin wordt gewerkt met testdata. Wij registreren alleen het IP-adres van het gebruikte apparaat. Dit is noodzakelijk voor de communicatie met de webservers van het Ministerie van Volksgezondheid, Welzijn en Sport. Het IP-adres wordt niet langer bewaard dan nodig is met oog op beveiliging, beheer en het opsporen van fouten in de proeftuin. Verder worden er geen persoonsgegevens verwerkt in de proeftuin.
            </p>
        </div>
    </section>

    <section>
        <div>
            <h2>Contact</h2>
            <p>Vragen over de proeftuin of het nieuwe UZI-stelsel kunnen worden gesteld via <a href="mailto:uzi-info@minvws.nl">uzi-info@minvws.nl</a>. De helpdesk is uitsluitend op werkdagen en tijdens kantooruren bereikbaar en biedt ondersteuning voor de proeftuin-omgeving op basis van best-effort.</p>
        </div>
    </section>
@endsection
