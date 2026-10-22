
<nav class="navbar">
    <a class="brand" href="{{ route('home') }}">
        Mini CMS
    </a>

    <div class="nav-links">
        <x-nav-link
            route="home"
            label="Accueil"
        />

        <x-nav-link
            route="posts.index"
            label="Articles"
        />

        <x-nav-link
            route="contact"
            label="Contact"
        />
    </div>
</nav>
