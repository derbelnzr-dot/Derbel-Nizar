# Mini-CMS

Mini-CMS est le projet fil rouge de l'Atelier Framework Côté Serveur (Laravel 13).

## État actuel (tag lab-02b)

- Pages construites avec des composants Blade anonymes : `x-navbar`, `x-nav-link`, `x-post-card`, `x-alert`, `x-page-header`.
- Lien actif dans la navigation avec `request()->routeIs()`.
- Articles toujours stockés dans un tableau PHP, sans base de données pour l'instant.

## Routes disponibles

| Méthode | URI | Nom | Action |
|---|---|---|---|
| GET | `/` | `home` | `PageController@home` |
| GET | `/a-propos` | `about` | `PageController@about` |
| GET | `/heure` | `time` | `PageController@time` |
| GET | `/posts` | `posts.index` | `PostController@index` |
| GET | `/posts/archive/{year}` | `posts.archive` | `PostController@archive` |
| GET | `/posts/{slug}` | `posts.show` | `PostController@show` |

## Captures d'écran

### Accueil avec le layout

![Page d'accueil avec le layout](screenshots/s03-accueil.png)

### Liste des articles

![Liste des articles](screenshots/s03-articles.png)

### Détail d'un article

![Détail d'un article](screenshots/s03-article.png)

### Session 04

![Liste des articles](screenshots/s04-articles.png)
