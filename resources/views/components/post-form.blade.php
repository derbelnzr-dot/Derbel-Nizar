@props(['post' => null, 'action', 'method' => 'POST'])

<form method="POST" action="{{ $action }}" class="max-w-2xl space-y-5">
    @csrf
    @if ($method !== 'POST')
        @method($method)
    @endif

    <div>
        <label for="title" class="block text-sm font-medium text-gray-700">Titre</label>
        <input type="text" id="title" name="title" value="{{ old('title', $post->title ?? '') }}" class="mt-1 w-full rounded-md border border-gray-300 px-3 py-2">
        @error('title')
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label for="slug" class="block text-sm font-medium text-gray-700">Slug (minuscules, chiffres et tirets)</label>
        <input type="text" id="slug" name="slug" value="{{ old('slug', $post->slug ?? '') }}" class="mt-1 w-full rounded-md border border-gray-300 px-3 py-2">
        @error('slug')
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label for="excerpt" class="block text-sm font-medium text-gray-700">Extrait (facultatif, 255 caractères au plus)</label>
        <input type="text" id="excerpt" name="excerpt" value="{{ old('excerpt', $post->excerpt ?? '') }}" class="mt-1 w-full rounded-md border border-gray-300 px-3 py-2">
        @error('excerpt')
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label for="body" class="block text-sm font-medium text-gray-700">Contenu</label>
        <textarea id="body" name="body" rows="8" class="mt-1 w-full rounded-md border border-gray-300 px-3 py-2">{{ old('body', $post->body ?? '') }}</textarea>
        @error('body')
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <div class="flex items-center gap-2">
        <input type="checkbox" id="is_published" name="is_published" value="1" @checked(old('is_published', $post->is_published ?? false))>
        <label for="is_published" class="text-sm text-gray-700">Publier</label>
    </div>

    <div class="flex items-center gap-4">
        <button type="submit" class="rounded-md bg-indigo-600 px-5 py-2.5 font-medium text-white hover:bg-indigo-700">Enregistrer</button>
        <a href="{{ route('posts.index') }}" class="text-sm text-gray-600 hover:underline">Annuler</a>
    </div>
</form>
