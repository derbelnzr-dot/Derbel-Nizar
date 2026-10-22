
@props([
    'title',
    'content',
    'id' => null
])

<article class="post-card">
    <h2>{{ $title }}</h2>

    <p>{{ $content }}</p>

    @if ($id !== null)
        <a
            class="btn"
            href="{{ route('posts.show', ['id' => $id]) }}"
        >
            Lire la suite
        </a>
    @endif
</article>
