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

            <p>In de proeftuin kan het vernieuwde UZI-stelsel (werknaam UZI-Online) door derde partijen worden getest. Leveranciers van zorgapplicaties en inlogmiddelen kunnen ervaren hoe inloggen via UZI-Online werkt en kunnen een aanvraag indienen om aan te sluiten op UZI-Online. Hoe dat werkt vindt u <a href="{{ route('index') }}">op de landingspagina.</a></p>
            <p>De proeftuin is ontwikkeld door het Ministerie van Volksgezondheid, Welzijn en Sport. Het nieuwe UZI-stelsel is op dit moment in ontwikkeling. Daarmee is de software—en dus ook de proeftuin—mogelijk onderhevig aan verandering door implementatiekeuzes tot het nieuwe stelsel in werking treedt. Ondersteuning en onderhoud van de proeftuin geschiedt op best effort tijdens kantooruren.</p>
        </div>
    </section>

    <section>
        <div>
            <h2>Versiegeschiedenis</h2>
            <p>De laatste update van de proeftuin was op 14-11-2023.</p>
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
                    <td>v1.0</td>
                    <td>14-11-2023</td>
                    <td>Lorem ipsum dolor sit amet</td>
                </tr>
                <tr>
                    <td>v0.0.3</td>
                    <td>21-10-2023</td>
                    <td>Lorem ipsum</td>
                </tr>
                <tr>
                    <td>v0.0.2</td>
                    <td>20-10-2023</td>
                    <td>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi placerat quam ut velit malesuada, ac sollicitudin metus pretium. Fusce a odio eu metus efficitur pharetra.</td></td>
                </tr>
                <tr>
                    <td>v.0.01</td>
                    <td>08-09-2023</td>
                    <td>Lorem ipsum dolor set amet.</td>
                </tr>
                </tbody>
            </table>
        </div>
    </section>

    <section class="background-color-offset">
        <div>
            <h2>Privacy</h2>
            <p>
                In de <a href="https://www.rijksoverheid.nl/ministeries/ministerie-van-volksgezondheid-welzijn-en-sport/privacy">privacyverklaring van het Ministerie van Volksgezondheid, Welzijn en Sport</a> kunt u lezen hoe VWS omgaat met gegevensbescherming.
            </p>
            <p>
                In de proeftuin wordt gewerkt met testdata.  Er worden geen persoonsgegevens verwerkt. Wij registreren alleen het IP-adres van de computer die u gebruikt.  Dit is noodzakelijk voor de communicatie met de webservers van VWS. Het IP-adres wordt bewaard zolang als nodig is met oog op beveiliging, beheer en het opsporen met fouten en zolang de proeftuin operationeel is.
            </p>
        </div>
    </section>

    <section>
        <div>
            <h2>Contact</h2>
            <p>
                Voor vragen over de proeftuin, of het nieuwe UZI-stelsel, kunt u een e-mail sturen naar <a href="mailto:l.kielman@minvws.nl">l.kielman@minvws.nl</a>. De helpdesk is uitsluitend op werkdagen en tijdens kantooruren bereikbaar en biedt ondersteuning voor de proeftuin-omgeving op basis van best-effor
            </p>
        </div>
    </section>
@endsection
