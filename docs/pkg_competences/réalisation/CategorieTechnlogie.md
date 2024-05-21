---
layout: default
chapitre : true
package: pkg_competences
order:  626
---

- Ajouter description et nom dans CategorieTechnologie table

````bash
php artisan make:migration add_description_nom_to_CategorieTechnologie_table --table=CategorieTechnologie
php artisan migrate
````

- Ajouter UNite pour CategorieTechnologie

````bash
php artisan make:test pkg_competences/CategorieTechnologieTest
php artisan test
````
