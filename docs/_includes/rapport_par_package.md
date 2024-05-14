{% assign pages = site.pages | sort: "order" %}
{% for page in pages %}
  {% if page.package == "global" or  page.package == package_name %}
    {{- page.content | markdownify -}}
  {% endif %}
{% endfor %}
