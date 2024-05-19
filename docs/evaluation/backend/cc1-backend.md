---
layout: default
chapitre: false
package: pkg_notifications
order: 1
---

# Backend - CC1

 


<!-- Get List of packages -->
{% assign packages = '' | split: ',' %}
{% assign pages = site.pages | sort: "order" %}
{% for page in pages %}
{% if 
    page.order > 600 and  page.order < 700  
    and page.chapitre == true 
    and page.package != "global"
    and page.package != "pkg_rapport"
    and page.evaluation= "cc1"
%}
{% assign package = page.package | split: ',' %}  
{% assign packages = packages | concat: package %}
{%  endif %} 
{% endfor %}
{% assign packages = packages | uniq  %}  


<ul>
  {% for item in packages %}
    <li>{{ item }}</li>
  {% endfor %}
</ul>


# Analyse 

{% assign pages = site.pages | sort: "order" %}
{% for page in pages %}
{% if 
    (page.order > 300 and  page.order < 400 ) 
    and page.chapitre == true 
    and page.package != "global"
    and page.package != "pkg_rapport"
    and packages contains page.package
%}
<!-- {{- page.path  | markdownify -}} -->
    {{- page.content | markdownify -}}
{%  endif %} 
{% endfor %}

# Conception 

{% assign pages = site.pages | sort: "order" %}
{% for page in pages %}
{% if 
    page.order > 500 and  page.order < 600  
    and page.chapitre == true 
    and page.package != "global"
    and page.package != "pkg_rapport"
    and packages contains page.package
%}
<!-- {{- page.path  | markdownify -}} -->
    {{- page.content | markdownify -}}
{%  endif %} 
{% endfor %}

# Questions 

{% assign pages = site.pages | sort: "order" %}
{% for page in pages %}
{% if 
    page.order > 600 and  page.order < 700  
    and page.chapitre == true 
    and page.package != "global"
    and page.package != "pkg_rapport"
    and page.evaluation == "cc1"
%}
<!-- {{- page.path  | markdownify -}} -->
    {{- page.content | markdownify -}}
{%  endif %} 
{% endfor %}