---
layout: default
order: 1
---
{% assign pages = site.pages | sort: "order" %}
{% for page in pages %}
  {% if page.chapitre == "gestion_projects" or page.package == "gestion_projects" %}
    {{- page.content | markdownify -}}
  {% endif %}
{% endfor %}
