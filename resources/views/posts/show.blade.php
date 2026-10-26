<x-layout>
    <x-slot:title>{{ $post->title }} - Mini-CMS</x-slot:title>

    <article class="max-w-2xl">
        <a href="{{ route('posts.index') }}" class="text-sm text-indigo-600 hover:underline">Retour aux articles</a>

        <h1 class="text-3xl font-bold mt-4 mb-2">{{ $post->title }}</h1>

        <p class="text-sm text-gray-500 mb-6">
            @if ($post->published_at)
                Publié le {{ $post->published_at->format('d/m/Y') }}
            @else
                Brouillon
            @endif
        </p>

        @if ($post->excerpt)
            <p class="text-lg text-gray-600 mb-6">{{ $post->excerpt }}</p>
        @endif

        <div class="text-gray-800 leading-relaxed whitespace-pre-line">{{ $post->body }}</div>

        <div class="mt-8 flex items-center gap-4">
            <a href="{{ route('posts.edit', $post) }}" class="text-sm text-indigo-600 hover:underline">Modifier</a>
            <form method="POST" action="{{ route('posts.destroy', $post) }}">
                @csrf
                @method('DELETE')
                <button type="submit" class="text-sm text-red-600 hover:underline">Supprimer</button>
            </form>
        </div>
    </article>
</x-layout>
