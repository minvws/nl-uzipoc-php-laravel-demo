<nav
    data-open-label="Menu"
    data-close-label="Sluit menu"
    data-media="(min-width: 42rem)"
    aria-label="{{ __('Main navigation') }}"
    class="collapsible">
    <div class="collapsing-element">
        <ul>
            <li>
                <a href="{{ route('index') }}" @if(\Illuminate\Support\Facades\Route::currentRouteName() === 'index') aria-current="page" @endif><span class="icon icon-home">Home-icoon</span>@lang('Labs')</a>
            </li>
            <li>
                <a href="{{ route('about') }}" @if(\Illuminate\Support\Facades\Route::currentRouteName() === 'about') aria-current="page" @endif>@lang('About') @lang('UZI Labs')</a>
            </li>
        </ul>
    </div>
</nav>
