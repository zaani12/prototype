{% assign pages = site.pages | sort: "order" %}
{% for page in pages %}
<!-- page.package == "global" or -->
{% if page.package=="rapport" or page.package == package_name %}
<!-- {{- page.path  | markdownify -}} -->
    {{- page.content | markdownify -}}
  {% endif %}
{% endfor %}
