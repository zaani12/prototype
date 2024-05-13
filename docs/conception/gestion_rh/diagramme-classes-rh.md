---
layout: default
chapitre: Conception
order: 520
---

## Package - Gestion RH

### Diagramme de classe : gestion_rh

![Diagramme de classe : Gestion RH](/prototype/conception/gestion_rh/images/diagrammes-classes-gstion_rh.png){:width="300px"}
*Figure : Diagramme de classe - Gestion RH*


### Diagrammes dynamique

<pre class="mermaid">

classDiagram

class Personne {
    + id: int 
    + nom: String 
    + prenom: String 
}


class Utilisateur {
    + id : int
    + login: String 
    + password: String 

}

 
Personne <|-- Formateur
Personne <|-- Apprenant

Utilisateur "1" <-- "*" Formateur : "compte"
Utilisateur "1" <-- "*" Apprenant : "compte"

</pre>


### Schéma de navigation

<!-- TODO laravel-3 : Donnez le schéma de navigation de l'interface CRUD de gestion des formateurs -->