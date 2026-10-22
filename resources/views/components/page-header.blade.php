@props([
    'title' => null,
    'subtitle' => null,
    'description' => null,
])

@php
    $text = $subtitle ?? $description;
@endphp

<header class="mb-6">
    <h1 class="text-3xl font-bold text-gray-900">{{ $title ?? $slot }}</h1>

    @if ($text)
        <p class="mt-2 text-gray-600">{{ $text }}</p>
    @endif
</header>
