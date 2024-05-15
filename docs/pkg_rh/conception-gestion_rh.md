---
layout: default
chapitre: Conception
order: 540
---

## Conception - gestion_rh

### Diagramme de classe

<pre class="mermaid">

---
title : Gestion RH
---

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
*Figure : Diagramme de classe - Gestion RH*

### Schéma de navigation

<!-- TODO laravel-3 : Donnez le schéma de navigation de l'interface CRUD de gestion des formateurs -->

<pre class="mermaid">
---
title : En construction
---

graph TD
A[Index] --> B[Ajouter]
A --id--> C[Supprimer]
A --id--> D[Modifier]

</pre>
*Figure : Schéma de navigation de gestion des formateurs*