# Mini-CMS

Mini-CMS est le projet fil rouge de l'Atelier Framework Côté Serveur (Laravel 13).

## État actuel (tag lab-03)

- Articles enregistrés dans une base SQLite et lus avec le modèle Eloquent `Post`.
- Table `posts` créée par une migration : après un clone, `php artisan migrate` la recrée (vide).
- Liste paginée, détail par liaison modèle-route, formulaire de création avec validation côté serveur.
- Premiers tests Pest : `php artisan test`.

## Routes disponibles

| Méthode | URI | Nom | Action |
|---|---|---|---|
| GET | `/` | `home` | `PageController@home` |
| GET | `/a-propos` | `about` | `PageController@about` |
| GET | `/heure` | `time` | `PageController@time` |
| GET | `/posts` | `posts.index` | `PostController@index` |
| GET | `/posts/archive/{year}` | `posts.archive` | `PostController@archive` |
| GET | `/posts/create` | `posts.create` | `PostController@create` |
| POST | `/posts` | `posts.store` | `PostController@store` |
| GET | `/posts/{post}` | `posts.show` | `PostController@show` |

## Captures d'écran

### Accueil avec le layout

![Page d'accueil avec le layout](screenshots/s03-accueil.png)

### Liste des articles

![Liste des articles](screenshots/s03-articles.png)

### Détail d'un article

![Détail d'un article](screenshots/s03-article.png)

### Session 04

![Liste des articles](screenshots/s04-articles.png)

### Session 05

![Liste paginée des articles](screenshots/s05-articles.png)

![Formulaire avec erreurs de validation](screenshots/s05-formulaire.png)
