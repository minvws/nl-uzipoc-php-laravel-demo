<dl>
@if(array_is_list($data))
    @foreach($data as $item)
        @if(is_array($item))
            <x-recursive-array :data="$item" />
        @else
            <div><dt></dt><dd>{{ $item }}</dd></div>
        @endif
    @endforeach
@else
    @foreach($data as $key => $value)
        @if(is_array($value) && array_is_list($value))
            @php $allScalar = collect($value)->every(fn($v) => !is_array($v)); @endphp
            @if($allScalar)
                <div>
                    <dt>{{ $key }}</dt>
                    <dd>{{ implode(', ', $value) }}</dd>
                </div>
            @else
                <x-recursive-array :data="$value" />
            @endif
        @elseif(is_array($value))
            <div>
                <dt>{{ $key }}</dt>
                <dd>
                    <dl>
                        <x-recursive-array :data="$value" />
                    </dl>
                </dd>
            </div>
        @else
            <div>
                <dt>{{ $key }}</dt>
                <dd>{{ $value }}</dd>
            </div>
        @endif
    @endforeach
@endif
</dl>
