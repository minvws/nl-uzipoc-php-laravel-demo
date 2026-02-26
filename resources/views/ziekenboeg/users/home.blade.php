@extends('layouts.ziekenboeg.app-with-sidebar')

@php
/* @var $user \App\Models\UziUser */
@endphp

@section('sidemenu')
    <nav class="ziekenboeg-sidemenu">
        <div>
            <div class="sticky-top">
                <h3>Welkom bij de Ziekenboeg</h3>

                <p>
                    De ingelogde omgeving van de Ziekenboeg.
                </p>

                <p>
                    De demo applicatie geeft aan welke gegevens uit het proeftuin UZI-register zijn opgehaald voor de testidentiteit waarmee is ingelogd.
                </p>

                <p>
                    Op basis van die gegevens kunnen zorgplatforms identiteiten autoriseren.
                </p>
            </div>
            <div class="sticky-bottom">
                <ul>
                    @if(\Illuminate\Support\Facades\Route::has('index'))
                        <li>
                            <a href="{{ route('index') }}" class="back-to-proeftuin">
                                Terug naar de Proeftuin hoofdpagina
                            </a>
                        </li>
                    @elseif(\Illuminate\Support\Facades\Route::has('ziekenboeg.home'))
                        <li>
                            <a href="{{ route('ziekenboeg.home') }}" class="back-to-proeftuin">
                                Terug naar de {{ config('app.name') }} hoofdpagina
                            </a>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
@endsection

@section('content')
    <section>
        <div>
            <h1>U bent succesvol ingelogd bij de Ziekenboeg.</h1>
            <p>We hebben de volgende gegevens voor deze testidentiteit uit het UZI-register opgehaald:</p>
        </div>
    </section>

    <section>
    <div>
        <h2>Gegevens</h2>
        <dl>
            @foreach($user->toArray() as $key => $value)
                <div>
                    <dt>{{ $key }}</dt>
                    <dd>
                        @if(is_array($value))
                            <x-recursive-array :data="$value" />
                        @else
                            {{ $value }}
                        @endif
                    </dd>
                </div>
            @endforeach
        </dl>
    </div>
</section>

@if($user instanceof \App\Models\Dezi\DeziUser)
<section>
    <div>
        <h2>Verklaring gegevens</h2>
        <dl>
            @foreach((array)$user->declaration as $key => $value)
                <div>
                    <dt>{{ $key }}</dt>
                    <dd>
                        @if(is_array($value))
                            <x-recursive-array :data="$value" />
                        @else
                            {{ $value }}
                        @endif
                    </dd>
                </div>
            @endforeach
        </dl>
    </div>
</section>
@endif

<section>
    <div>
        <h2>Userinfo JWT</h2>
        <pre><code id="jwt-token">{{ $user->getJwt() }}</code></pre>
        <button type="button" onclick="
            navigator.clipboard.writeText(document.getElementById('jwt-token').textContent);
            this.textContent = 'Gekopieerd!';
            setTimeout(() => this.textContent = 'Kopieer', 2000);
        ">Kopieer</button>
    </div>
</section>

<section>
    <div>
        <h2>JSON-encoded Userinfo JWT</h2>
        <button type="button" onclick="
            navigator.clipboard.writeText(document.getElementById('jwt-json').textContent);
            this.textContent = 'Gekopieerd!';
            setTimeout(() => this.textContent = 'Kopieer', 2000);
        ">Kopieer</button>
        <pre><code id="jwt-json">{{ $user->getJwt(true) }}</code></pre>
    </div>
</section>
@endsection
