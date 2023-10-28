@auth
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

        <ul>
            <li>
                <x-header-logout-button />
            </li>
        </ul>
    </div>
</nav>
@endauth
