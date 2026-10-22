
@props([
    'route',
    'label'
])

<a
    href="{{ route($route) }}"
    class="{{ request()->routeIs($route) ? 'active' : '' }}"
    @if (request()->routeIs($route))
        aria-current="page"
    @endif
>
    {{ $label }}
</a>
