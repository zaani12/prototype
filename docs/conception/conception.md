---
layout: default
chapitre: Conception
order: 500
---

# Conception
{:class="sectionHeader"}

<!-- TODO rédaction-2 : Introduction

- Rappel de rôle de conception 
- Sa différence avec l'analyse
- Le contenue de partie
 -->


## Rappel - Diagramme de classe dynamique

<!-- TODO uml-2 : Rappel 
- réalisation d'un exposé sur 
- diagramme de séquence dynamique
- diagramme de classe dynamique  
-->


## Edition des diagrammes 

à voir sur : 

- [documentation](https://mermaid.js.org/syntax/classDiagram.html)
- [mermaid.live](https://mermaid.live/)

````php
classDiagram
class Projet {
  + id: int
  + nom: string
  + description: string
}

class Tâche {
  + id: int
  + nom: string
  + description: string
  + priorité: int
  + état: string
}

Projet --* Tâche

````

## Diagramme de navigation 

Un exemple de diagramme de navigation
````
graph TD
A[Index] --> B[Ajouter]
A --id--> C[Supprimer]
A --id--> D[Modifier]
````