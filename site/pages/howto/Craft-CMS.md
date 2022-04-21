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

**Package Name:** verbb/smith

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

### Include

```twig
{% include 'header.html' %}
```

### Ternary operator

```twig
{{ foo ? 'yes' : 'no' }}
{{ foo ?: 'no' }} {# If `foo` echo it, else echo 'no' #}
{{ foo ? 'yes' }} {# If `foo` echo 'yes' else echo nothing #}
{{ foo ?? 'no' }} {# `foo` if it is defined and not null, 'no' otherwise #}
{{ foo|default('no') }} {# `foo` if it is defined (empty values also count), 'no' otherwise #}
```

### Current Year

```twig
{{ 'now' | date('Y') }}
```

### Debugging

```twig
{{ dump(varname) }}
```

### Conditions

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

### Loop

```twig
{% for block in entry.matrixStandard.all() %}
...
{% endfor %}
```

### Macros

#### Inline

```twig
{% macro image(image) %}
    {% if image %}
        <img loading="lazy" class="img-fluid w-100" src="{{ image ? image.getUrl() }}" alt="{{ image ? image.title }}"/>
    {% endif %}
{% endmacro %}

{{ _self.image(entry.image.one) }}
```

#### From external file

```twig
{% import "./_includes/macros.twig" as macros %}

{{ macros.image(entry.image.one) }}
```

See also: https://twig.symfony.com/doc/3.x/tags/macro.html

### Read fields

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

Filter not empty

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

#### CraftCMS Navigation with Bootstrap 5

```twig
<nav class="navbar navbar-expand-lg navbar-light">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
            aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mx-auto">
            {% set mainNavigation = craft.entries.section('mainNavigation').level('1').all() %}
            {% for page in mainNavigation %}
                {% set isAncestor = entry is defined and page.isAncestorOf(entry) %}
                <li class="dropdown nav-item">
                    <a class="nav-link {{ (page.id == entry.id or isAncestor) ? 'active' }}"
                       id="{{ page.id }}" role="button" data-bs-toggle="dropdown"
                       aria-expanded="false">{{ page.title }}</a>
                    <ul class="dropdown-menu" aria-labelledby="{{ page.id }}">
                        {% for child in page.children.all() %}
                            <li><a class="dropdown-item" href="{{ child.url }}">{{ child.title }}</a></li>
                        {% endfor %}
                    </ul>
                </li>
            {% endfor %}
        </ul>
    </div>
</nav>
```

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

### Settings/Sites

- Name `Default (de)`
- Handle `defaultDe`
- Base URL `$DEFAULT_SITE_URL_DE`

| Name         | Handle      | Language | Primary | Base URL               | Group       |      |
| :----------- |:------------|:---------|:--------|:-----------------------|:------------| ---- |
| Default (de) | `defaultDe` | `de`     | X       | `$DEFAULT_SITE_URL_DE` | example.com |      |
| Default (en) | `defaultEn` | `en`     |         | `$DEFAULT_SITE_URL_EN` | example.com |      |

## Create Section

### Home

- Name `Home`
- Handle `home`
- Section Type `Single`
 
Site Settings

| Site         | House | URI  | Template |
| :----------- |:------| :--- | :------- |
| Default (de) | X     |      | _home    |
| Default (en) | X     |      | _home    |


### Main Navigation

- Name `Main Navigation`
- Handle `mainNavigation`
- Section Type `Structure`

Site Settings

| Website      |      | Eintrags-URI-Format | Vorlage  | Standardstatus |
| :----------- | :--- | :------------------ | :------- | :------------- |
| Default (de) |      | {slug}              | _default | on             |
| Default (en) |      | {slug}              | _default | on             |

## Assets

Create a new asset volume.

- Name `Downloads`
- Handle `downloads`
- Assets in this volume have public URLs `check`
- Base URL `/media/downloads`
- Volume Type `Local Folder`
- File System Path `media/downloads`

## Extensions

Steps to create an extension

1. Create a plugin via https://pluginfactory.io (or [generator-craftplugin](https://github.com/nystudio107/generator-craftplugin))
   - Plugin Name `TwigExtensions`
   - Initial Version `1.0.0`
   - Plugin Vendor `shaack`
   - Author `Stefan Haack`
   - Turn on Switches `Code Comments` and `TwigExtensions` 
2. Create a folder `craft/local/extensions`
3. Copy the `twigextensions` folder to `craft/local/extensions`
4. Add the path to `composer.json`
```json
"repositories": [
  {
    "type": "path",
    "url": "./local/extensions/*"
  }
]
```
5. Install it with `composer require shaack/twig-extensions`
6. Enable the plugin via admin interface

After changing the code of the plugin, call again
```bash
composer require shaack/twig-extensions
```