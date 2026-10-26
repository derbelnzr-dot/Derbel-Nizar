# Session 05 - Défi : articles récents sur l'accueil

latestPosts contient au plus 3 articles : oui
Seuls les articles publiés sont transmis à la vue : oui
home.blade.php utilise x-post-card et @forelse : oui
Le nouveau test passe et php artisan test est vert : oui

Pourquoi get() et pas paginate(3) sur la page d'accueil ?
Parce que l'accueil ne doit afficher qu'un aperçu limité (3 derniers articles), sans système de pagination. get() exécute la requête et retourne une collection, tandis que paginate() est destiné aux listes complètes avec navigation entre pages.
