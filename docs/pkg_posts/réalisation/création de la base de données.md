---
layout: default
chapitre: true
package : pkg_autorisations
order: 620
---

### Création de la base de données 


````bash
php artisan make:migration pkg_posts/create_posts_table
php artisan make:migration pkg_posts/create_tags_table
php artisan make:migration pkg_posts/create_post_tag_table
````