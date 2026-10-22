<x-layout>
    <x-slot:title>{{ $heading }} - Mini-CMS</x-slot:title>

    <h1 class="text-3xl font-bold">{{ $heading }}</h1>

    @forelse ($posts as $slug => $post)
        <div class="mt-6">
            <x-post-card :title="$post['title']" :content="$post['excerpt']" :slug="$slug" :year="$post['year']" />
        </div>
    @empty
        <x-alert type="info" title="Aucun article">Aucun article pour cette sélection.</x-alert>
    @endforelse
</x-layout>
