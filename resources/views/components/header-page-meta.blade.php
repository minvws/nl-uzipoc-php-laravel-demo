<div class="page-meta no-print">
    @auth
        <div class="login-meta">
            <p>{{ __("Logged in as") }}: {{ Auth::user()->getName() }}</p>
        </div>
    @endauth
    <div class="language">
        <a href="{{ route('change-language', ['locale' => 'nl']) }}" @if(app()->getLocale() === 'nl') aria-current="true" @endif>Nederlands</a>
        <a href="{{ route('change-language', ['locale' => 'en']) }}" @if(app()->getLocale() === 'en') aria-current="true" @endif>English</a>
    </div>
</div>
