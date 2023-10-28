@extends('layouts.ziekenboeg.app')

@php
/* @var $user \App\Models\UziUser */
@endphp

@section('content')
<section>
    <div>
        <h1>@lang('Ziekenboeg')</h1>
        <p>@lang('You are signed in in the employee portal of the health application!')</p>
    </div>
</section>

<section>
    <div>
        <h2>@lang('Data')</h2>
        <p>@lang('We received the following data from the UZI-register.')</p>
        <dl>
            <div>
                <dt>Initialen</dt>
                <dd>{{ $user->initials }}</dd>
            </div>
            <div>
                <dt>Tussenvoegsel</dt>
                <dd>{{ $user->surnamePrefix }}</dd>
            </div>
            <div>
                <dt>Achternaam</dt>
                <dd>{{ $user->surname }}</dd>
            </div>
            <div>
                <dt>UZI-nummer</dt>
                <dd>{{ $user->uziId }}</dd>
            </div>
        </dl>

        <h3>@lang('Abonee')</h3>
        @foreach($user->uras as $ura)
        <dl>
            <div>
                <dt>Naam abonee</dt>
                <dd>{{ $ura->entityName }}</dd>
            </div>
            <div>
                <dt>Abonnee nummer</dt>
                <dd>{{ $ura->ura }}</dd>
            </div>
            <div>
                <dt>Rol</dt>
                <dd>@foreach($ura->roles as $role) {{ $role->code }} ({{$role->name}}) @endforeach</dd>
            </div>
        </dl>
        @endforeach

        <h3>@lang('Metadata')</h3>
        <dl>
            <div>
                <dt>Level of Assurance</dt>
                <dd>{{ $user->loaAuthn }}</dd>
            </div>
        </dl>
    </div>
</section>
@endsection
