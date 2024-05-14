---
layout: default
chapitre: Conception
order: 530
---

## Conception - Gestion des compétences

### Diagramme de classe

<pre class="mermaid">

classDiagram
class Competence {
  id : int
  nom : String
  description : String
}
class NiveauCompetence {
  id : int
  nom : String
  description : String
}

namespace gestion_technologies {
class Technologie
}

Competence "*" --> "1" NiveauCompetence
Competence "*" --> "1" Technologie 
 

</pre>