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
        </ul>

        @auth
            <ul>
                <li>
                    <x-header-logout-button />
                </li>
            </ul>
        @else
            <ul>
                <li>
                    <a href="{{ route('ziekenboeg.login') }}"><span class="icon icon-user">@lang('User icon')</span>@lang('Login')</a>
                </li>
            </ul>
        @endauth
    </div>
</nav>
