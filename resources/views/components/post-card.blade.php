@props([
    'title',
    'content',
    'slug' => null,
    'year' => null,
])

<article class="rounded border border-gray-200 bg-white p-4">
    <h2 class="text-xl font-medium text-red-600">
        @if ($slug)
            <a href="{{ route('posts.show', $slug) }}" class="hover:underline">{{ $title }}</a>
        @else
            {{ $title }}
        @endif
    </h2>

    @if ($year)
        <p class="mt-1 text-sm text-gray-500">Publié en {{ $year }}</p>
    @endif

    @if ($content)
        <p class="mt-2 leading-relaxed text-gray-700">{{ $content }}</p>
    @endif

    @if ($slug)
        <p class="mt-4">
            <a href="{{ route('posts.show', $slug) }}" class="text-red-600 underline">Lire la suite</a>
        </p>
    @endif
</article>
