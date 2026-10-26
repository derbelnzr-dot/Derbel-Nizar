# Session 07 - Défi : articles de la même catégorie

La section « Dans la même catégorie » apparaît sous un article publié qui a une catégorie : oui
L'article affiché n'apparaît pas dans sa propre section : oui
Un brouillon de la même catégorie n'apparaît pas : oui
La page s'ouvre sans LazyLoadingViolationException : oui
Le nouveau test passe et php artisan test est vert : oui

Combien de requêtes SQL charge la section, et pourquoi pas une par carte ?
La section charge 4 requêtes : une pour les articles de la catégorie, puis une pour les auteurs, une pour les catégories et une pour les tags, quel que soit le nombre de cartes, grâce à with(). Sans lui, chaque carte déclencherait des requêtes supplémentaires (9 de plus pour trois cartes) et la page lèverait une LazyLoadingViolationException, car les articles sont chargés à plusieurs.
