@extends('layouts.app')
@section('content')
<section role="alert" class="explanation no-print" aria-label="{{ __('Explanation') }}">
    <div>
        <p><span>@lang('Explanation'):</span> @lang('Please note, this view is part of the pilot environment.')</p>
    </div>
</section>

@if (session()->has('error'))
    <section role="alert" class="error no-print" aria-label="{{__('error') }}">
        <div>
            <h4>{{ session('error') }}</h4>
            <p>{{ session('error_description') }}</p>
        </div>
    </section>
@endif

<section class="disclosure">
    <div>
        <h1>@lang('UZI Pilot Labs')</h1>
        <p>@lang('You are signed in!')</p>
    </div>
</section>
@endsection
