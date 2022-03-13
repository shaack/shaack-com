# Craft CMS

- https://craftcms.com/docs/

## Install

In the root folder of your preoject.

```shell
composer self-update
composer create-project craftcms/craft
./craft setup
```

(See also: [MAMP, enable Composer](Composer))

Then set the web root folder to `/craft/web`.

## My base setup

### Structure in /web

- web/assets/
  - fonts
  - images
  - scripts
  - styles - see [Bootstrap/Integrate Bootstrap with scss](Bootstrap)

### npm

```shell
cd craft/web
npm init
npm install bootstrap
npm install webtools-js
```

.gitignore 
```gitignore
.idea
node_modules
```

### Standard templates

#### _base.twig

```twig
{% set templateVersion = "2203121947" %}
{% set env = getenv('ENVIRONMENT') %}
<!doctype html>
<html lang="{{ craft.app.language }}">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, user-scalable=yes, initial-scale=1.0"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <link rel="stylesheet" href="/assets/styles/screen.css?v={{ templateVersion }}">
    <title>Site Name - {{ entry.title }}</title>
</head>
<body class="debug env-{{ env }} entry-type-{{ entry.type ?? 'unknown' }} {% block bodyClass %}{% endblock bodyClass %}">
{% include "_header.twig" %}
<main>
    {% block main %}{% endblock %}
</main>
{% include "_footer.twig" %}
<script src="/node_modules/bootstrap/dist/js/bootstrap.bundle.js?v={{ templateVersion }}"></script>
<script src="/node_modules/webtools-js/src/webtools.js?v={{ templateVersion }}"></script>
</body>
</html>
```

### _default.twig

```twig
{% extends "_base.twig" %}

{% block main %}
    {% include "_matrix.twig" %}
{% endblock %}
```

### _matrix.twig

```twig
<div class="matrix">
    {% if entry.matrix is not empty %}
        {% for block in entry.matrix.all() %}
            <div class="block block-{{ block.type.handle }}">
                {% include "blocks/" ~ "_" ~ block.type.handle ~ ".twig" with block %}
            </div>
        {% endfor %}
    {% endif %}
</div>
```

Additionally create a "matrix" field. 

## Useful Plugins

Install plugins from the terminal

```shell
composer require package/name
```

### Redactor

**Package Name:** craftcms/redactor

- Konfiguration erstellen `config/redactor/ShaackDefault.json`

```json
{
  "buttons": ["formatting", "bold", "italic", "deleted","unorderedlist", "orderedlist", "link", "image", "html"],
  "linkNewTab": true,
  "toolbarFixed": true,
  "formatting": ["p", "blockquote", "pre", "h1", "h2", "h3"]
}
```

### Smith

Add copy, paste and clone functionality to Matrix blocks.

Package Name: verbb/smith

### Contact Form

**Package Name:**  craftcms/contact-form

## Twig

```twig
Site ID: {{ currentSite.id }}<br/>
Site Handle: {{ currentSite.handle }}<br/>
Site Name: {{ currentSite.name }}<br/>
Site Language: {{ currentSite.language }}<br/>
Is Primary Site: {{ currentSite.primary }}<br/>
Base URL: {{ currentSite.baseUrl }}<br/>
Group: {{ currentSite.group }}<br/>
```

### include

```twig
{% include 'header.html' %}
```

### Twig Tenary operator

https://stackoverflow.com/questions/11820297/twig-ternary-operator-shorthand-if-then-else/40605919#40605919

### Current Year

```twig
{{ 'now' | date('Y') }}
```

### debugging

```twig
{{ dump(varname) }}
```

### if

```twig
{% if entry.showTitle %}
<h1>{{ entry.title }}</h1>
{% endif %}
```

| Value                  | Boolean evaluation |
| :--------------------- | :----------------- |
| empty string           | false              |
| numeric zero           | false              |
| NAN (Not A Number)     | true               |
| INF (Infinity)         | true               |
| whitespace-only string | true               |
| string “0” or ‘0’      | false              |
| empty array            | false              |
| null                   | false              |
| non-empty array        | true               |
| object                 | true               |

### loop

```twig
{% for block in entry.matrixStandard.all() %}
...
{% endfor %}
```

### macros

https://twig.symfony.com/doc/3.x/tags/macro.html

```twig
{% macro input(name, value, type = "text", size = 20) %}
    <input type="{{ type }}" name="{{ name }}" value="{{ value|e }}" size="{{ size }}" />
{% endmacro %}

<p>{{ _self.input('password', '', 'password') }}</p>
```

or via import

```twig
{% import "_macros.twig" as macros %}

{{ macros.youtube('abc123id') }}
```

### Read fields

From the entry: `entry.`

#### Matrix

```twig
{% for block in entry.matrixStandard.all() %}
...
{% endfor %}
```

#### Section

```twig
{% set posts = craft.entries().section('articles').orderBy('postDate desc').limit(20) %}
{% for post in posts.all() %}
    <li><a href="{{ post.getUrl() }}" class="mr-3">{{ post.title }}</a> <small>{% for topic in post.topics.all() %}<span class="mr-3">{{ topic }}</span>{% endfor %}</small></li>
{% endfor %}
```

#### Filter

Not empty

```twig
{% set members = craft.entries.section('members').memberHeroImage(':notempty:') %}
```

#### Shuffle

```twig
{% set shuffledImages = shuffle(block.images.all()) %}
```

### Request Parameter

```twig
{% set itemId = craft.app.request.getParam("item") %}
```

### Navigation

https://craftcms.com/guides/displaying-a-navigation-for-a-structure-section

#### Navigation with childs

```twig
{% set mainNavigation = craft.entries.section('mainNavigation') %}
{% nav page in mainNavigation.level(1).all() %}
	{% set isAncestor = entry is defined and page.isAncestorOf(entry) %}
	<li class="nav-item-{{ page.id }} nav-item {{ (page.id == entry.id or isAncestor) ? 'active' }}">
		<span class="nav-link" data-id="{{ page.id }}">{{ page.title }}</span>
		{% ifchildren %}
    	<ul>
    		{% children %}
    	</ul>
    {% endifchildren %}
	</li>
{% endnav %}
```

#### Collapsing Mobile menu

### Breadcrumb

https://craftcms.com/knowledge-base/displaying-breadcrumbs-for-an-entry

```twig
{% if entry.level > 1 %}
<nav class="nav-breadcrumb">
    <ol class="breadcrumb justify-content-center">
        <li class="breadcrumb-item"><a href="/">Start</a></li>
        {% for crumb in entry.getAncestors() %}
            <li class="breadcrumb-item"><a href="{{ crumb.descendants.one.getUrl() }}">{{ crumb }}</a></li>
        {% endfor %}
        <li class="breadcrumb-item active">{{ entry }}</li>
    </ol>
</nav>
{% endif %}
```

## Multi language

- Create two variables in `.env`

```
DEFAULT_SITE_URL="https://example.com"
DEFAULT_SITE_URL_DE="https://example.com/de"
DEFAULT_SITE_URL_EN="https://example.com/en"
```

- Under `Settings/Sites`
  - Name `Default (de)`
  - Handle `defaultDe`
  - Base URL `$DEFAULT_SITE_URL_DE`

| Name         | Kurzname    | Sprache | Primär | Basis-URL              | Gruppe            |      |
| :----------- | :---------- | :------ | :----- | :--------------------- |:------------------| ---- |
| Default (de) | `defaultDe` | `de`    | X      | `$DEFAULT_SITE_URL_DE` | example.com       |      |
| Default (en) | `defaultEn` | `en`    |        | `$DEFAULT_SITE_URL_EN` | example.com |      |

## Create Section

### Home

- Name: Home
- Handle: home
- Section Type: Single
- Site Settings

| Site         | Haus | URI  | Template |
| :----------- | :--- | :--- | :------- |
| Default (de) | X    |      | _home    |
| Default (en) | X    |      | _home    |


### Main Navigation

- Name `Main Navigation`
- Handle `mainNavigation`
- Section Type `Structure`

| Website      |      | Eintrags-URI-Format | Vorlage  | Standardstatus |
| :----------- | :--- | :------------------ | :------- | :------------- |
| Default (de) |      | {slug}              | _default | on             |
| Default (en) |      | {slug}              | _default | on             |


