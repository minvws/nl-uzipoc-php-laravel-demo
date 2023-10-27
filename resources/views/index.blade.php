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
            <p class="emphasized">Omschrijving met wat de proeftuin is, voor wie en waarom.</p>

            <p>Ruimte voor extra toelichting. Voor wie is de proeftuin (Als dat niet in de subtitel omschreven staat), wat kunnen gebruikers verwachten en doen.  Pellentesque tincidunt dolor a dui volutpat, ut molestie orci rutrum. Praesent vel tempor leo. Suspendisse at leo sit amet velit tempor convallis. Nam iaculis dapibus orci, in placerat tellus. Nam id euismod nisl. Vivamus turpis velit, facilisis ut leo sit amet, pellentesque pretium ipsum.</p>
        </div>
    </section>

    <section>
        <div>
            <h2>@lang('Environments')</h2>
            <p >Ontdek de verschillende omgevingen lorem ipsum dolor set amet.</p>
        </div>

        <div class="column-3">
            <div class="tile" role="group">
                <h1>UZI-digitaal</h1>
                <p>Inloggen bij zorgaanbieders door gebruik van een UZI-pas, DigiD of wallet applicatie.</p>
            </div>

            <div class="tile" role="group">
                <h1>Digitaal ondertekenen</h1>
                <p>Digitaal ondertekenen op basis van een UZI-digitaal login.</p>
            </div>

            <div class="tile" role="group">
                <h1>Zorgidentiteit en profielen</h1>
                <p>Inloggen via UZI-digitaal met alle erkende authenticatiemiddelen zoals wallets, DigiD, UZI-pas.</p>
            </div>

            <div class="tile" role="group">
                <h1>Zorgspecifiekemiddelen</h1>
                <p>Inloggen met UZI-digitaal op basis van zorgspecifieke middelen zoals bedrijfs- en ziekenhuispassen.</p>
            </div>

            <div class="tile" role="group">
                <h1>YIVI-Inlogroute</h1>
                <p>Inladen en genereren van YIVI-kaartjes in de wallet van de YIVI app op basis van je UZI gegevens.</p>
            </div>
        </div>
    </section>
@endsection
