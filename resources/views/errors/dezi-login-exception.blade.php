@extends('layouts.ziekenboeg.app')

@section('content')
    <section class="layout-authentication">
        <div>
            <div class="error" role="group" aria-label="{{__('Error') }}">
                <span>@lang('Error')</span>
                <h1>
                    @lang('Error')
                    @lang(403)
                </h1>
                <p>Er ging iets mis tijdens het inloggen met Dezi.</p>

                <a href="{{ route('ziekenboeg.home') }}" class="button">
                    Terug naar de hoofdpagina
                </a>
            </div>
        </div>
    </section>
@endsection
