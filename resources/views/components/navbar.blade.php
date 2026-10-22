<nav class="mx-auto flex max-w-3xl items-center gap-6 px-4 py-4">
    <a href="{{ route('home') }}" class="text-lg font-bold">Mini-CMS</a>
    <x-nav-link route="home" label="Accueil" />
    <x-nav-link route="about" label="À propos" />
    <x-nav-link route="posts.index" label="Articles" />
</nav>
