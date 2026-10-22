@props([
    'route',
    'label',
])

@php
    $prefix = explode('.', $route)[0].'.*';
    $active = request()->routeIs($route) || request()->routeIs($prefix);
@endphp

<a
    href="{{ route($route) }}"
    class="{{ $active ? 'font-semibold text-red-600' : 'text-gray-600 hover:text-gray-900' }}"
    @if ($active) aria-current="page" @endif
>
    {{ $label }}
</a>
