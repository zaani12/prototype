---
layout: default
order: 1
---

# Rapports

<a href="/prototype/pk_global/rapport/"> Rapport globale </a> 

## Par packages

<ul>
  {% for package in site.data.packages %}
    <li> <a href="/prototype/{{ package }}/rapport"> {{ package }} </a> </li>
  {% endfor %}
</ul>

## Organisation du rappor par package 

- Packages
  - global
    - Empathie
    - Diagramme de cas d'utilisation global
    - Diagramme de classe global
  - rapport
    - Table de matière
    - Introduction
    - Conclusion
  - pk_pakcage_name
    - Introdiction au package 
    - Analyse
    - Conception
    - Réalisation
    - Conclusion