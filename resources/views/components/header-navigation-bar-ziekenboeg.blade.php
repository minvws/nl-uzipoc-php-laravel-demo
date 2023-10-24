<nav
    data-open-label="Menu"
    data-close-label="Sluit menu"
    data-media="(min-width: 42rem)"
    aria-label="{{ __('Main navigation') }}"
    class="collapsible">
    <div class="collapsing-element">
        <ul>
            <li>
                <a href="{{ route('ziekenboeg.home') }}" @if(\Illuminate\Support\Facades\Route::currentRouteName() === 'ziekenboeg.home') aria-current="page" @endif><span class="icon icon-home">Home-icoon</span>@lang('Ziekenboeg')</a>
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
                    <a href="{{ route('oidc.login') }}"><span class="icon icon-user">@lang('User icon')</span>@lang('Login')</a>
                </li>
            </ul>
        @endauth
    </div>
</nav>
