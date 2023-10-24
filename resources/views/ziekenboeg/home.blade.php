@extends('layouts.ziekenboeg.app')
@section('content')
<section role="alert" class="explanation no-print" aria-label="{{ __('Explanation') }}">
    <div>
        <p><span>@lang('Explanation'):</span> @lang('Please note, this view is part of the pilot environment.')</p>
    </div>
</section>

<section class="disclosure">
    <div>
        <h1>@lang('Ziekenboeg')</h1>
        <p>@lang('You are signed in!')</p>
    </div>
</section>
@endsection
