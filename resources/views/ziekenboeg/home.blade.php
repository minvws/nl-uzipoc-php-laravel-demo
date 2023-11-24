@extends('layouts.ziekenboeg.app-with-sidebar')


@section('sidemenu')
    <nav class="ziekenboeg-sidemenu">
        <div class="space-between">
            <div class="gaps">
                <h3>Welkom bij De Ziekenboeg</h3>

                <p>
                    De Ziekenboeg is een fictief zorgplatform en dient als demo applicatie om het inloggen met
                    UZI-Online te kunnen ervaren.
                </p>

                <p>
                    Klik op <b>“Inloggen medewerkers”</b> om verder te gaan.
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
    <section class="hero">
        <img src="{{ asset('img/appelboom.png') }}" alt="Foto van een appelboom">
        <div class="one-third-two-thirds">
            <div class="tile">
                <h1>Zorg voor onze patienten</h1>
                <p>Welkom bij De Ziekenboeg. </p>
            </div>
        </div>
    </section>
    <section>
        <div>
            <h2>Nieuws</h2>

            <div class="tiles column-3">
                <div role="group">
                    <h1>De beddenbank opent haar deuren</h1>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                </div>

                <div role="group">
                    <h1>Lorem ipsum dolor set</h1>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                </div>

                <div role="group">
                    <h1>Lorem ipsum dolor set</h1>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                </div>
            </div>

            <a class="button ghost" href="#">Bekijk al het nieuws</a>
        </div>
    </section>
    <section>
        <div>
            <h2>Alles voor uw bezoek</h2>
            <div class="column-2 new-card">
                <div>
                    <div class="image-cover">
                        <img src="{{ asset('img/appelboom.png') }}" alt="Foto van een strand">
                    </div>
                </div>
                <div>
                    <h3>Uw bezoek</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent eget mattis lorem. Vivamus dapibus viverra quam, sit amet posuere ligula tristique eget. Pellentesque venenatis neque et placerat placerat. Proin nec porttitor nisl. Pellentesque vitae dui id lectus facilisis vehicula. Curabitur id sapien ultrices, consectetur ipsum in, tincidunt erat. Praesent a rutrum est, rutrum lacinia justo. Donec ut odio nec elit tincidunt maximus. Maecenas quis gravida metus.</p>
                    <a class="button ghost" href="#">Bereid u alvast voor</a>
                </div>
            </div>
            <div class="column-3 navigation-group">
                <div>
                    <h4>De details</h4>
                    <nav aria-label="Bezoek details navigatie">
                        <ul>
                            <li><a href="#">Bezoektijden</a></li>
                            <li><a href="#">Mijn Ziekenboeg</a></li>
                            <li><a href="#">Locatie</a></li>
                        </ul>
                    </nav>
                </div>
                <div>
                    <h4>Alles voor uw eerste bezoek</h4>
                    <nav aria-label="Eerste bezoek navigatie">
                        <ul>
                            <li><a href="#">Mijn eerste afspraak</a></li>
                            <li><a href="#">Wat moet ik meenemen?</a></li>
                            <li><a href="#">Mag er iemand met mij mee?</a></li>
                            <li><a href="#">Ik heb nog vragen</a></li>
                        </ul>
                    </nav>
                </div>
                <div>
                    <h4>Planning</h4>
                    <nav aria-label="Bezoek planning navigatie">
                        <ul>
                            <li><a href="#">Kan ik mijn afspraak wijzigen?</a></li>
                            <li><a href="#">Afspraak details inzien</a></li>
                            <li><a href="#">Lorem ipsum</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </section>
@endsection
