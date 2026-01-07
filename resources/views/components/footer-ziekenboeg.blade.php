<footer class="page-footer">
    <div>
        <nav aria-label="@lang('Footer navigation')">
            <ul>
                @if(\Illuminate\Support\Facades\Route::has('privacy-statement'))
                <li><a href="{{ route('privacy-statement') }}">@lang('Privacy statement')</a></li>
                @endif
                <li><a href="{{ route('ziekenboeg.about') }}">@lang('About') @lang('the health application')</a></li>
            </ul>
        </nav>
    </div>
</footer>
