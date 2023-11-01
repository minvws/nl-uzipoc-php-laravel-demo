@props([
    'logoComponent' => 'header-logo-default',
    'navigationComponent' => 'header-navigation-bar-default',
])

<header>
    <x-header-skip-to-content />
    <x-header-page-meta />
    <div>
        <x-dynamic-component :component="$logoComponent" />
        <x-dynamic-component :component="$navigationComponent" />
    </div>
</header>
