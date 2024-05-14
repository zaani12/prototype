---
layout: default
chapitre: Conception
order: 520
---

## Conception - Gestion des technologies

### Diagramme de classe

<pre class="mermaid">

classDiagram
class Technologie {
  id : int
  nom : String
  description : String
}
class CategorieTechnologie {
  id : int
  nom : String
  description : String
}
Technologie "*" --> "1" CategorieTechnologie
</pre>