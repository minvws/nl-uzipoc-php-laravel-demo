<nav
    data-open-label="Menu"
    data-close-label="Sluit menu"
    data-media="(min-width: 42rem)"
    aria-label="{{ __('Main navigation') }}"
    class="collapsible">
    <div class="collapsing-element">
        <ul>
        </ul>

        <ul>
            @auth
            <li>
                <a href="{{ route('ziekenboeg.home') }}" @if(\Illuminate\Support\Facades\Route::currentRouteName() === 'ziekenboeg.home') aria-current="page" @endif>Home</a>
            </li>
            @endauth
            <li>
                <a href="{{ route('ziekenboeg.contact') }}" @if(\Illuminate\Support\Facades\Route::currentRouteName() === 'ziekenboeg.contact') aria-current="page" @endif>Contact</a>
            </li>
            @auth
            <li>
                <x-header-logout-button />
            </li>
            @endauth
        </ul>
    </div>
</nav>
