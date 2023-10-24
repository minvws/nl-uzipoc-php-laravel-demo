@extends('layouts.ziekenboeg.app')

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
            <h1>@lang('Welcome to the Ziekenboeg')</h1>
            <p class="emphasized">@lang('On this website, you can .....')</p>
        </div>
    </section>
@endsection
