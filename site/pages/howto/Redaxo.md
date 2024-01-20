# Redaxo CMS

## Installation

- Unpack files
- create `.gitignore`
- Create the database
- Install CMS (call root url)
- First (initial) commit
- Install AddOns

## .gitignore

```bash
# redaxo configuration
# contains sensitive data and should not be stored in a git repo!
/redaxo/data/core/config.yml

# installer configuration
/redaxo/data/addons/install/config.json

# cache folder (except hidden files)
/redaxo/cache/*
!/redaxo/cache/.*

# media folder (except hidden files)
/media/*
!/media/.*

# log folder and log files
/redaxo/data/log/*
*.log

# shaack specific
/.idea
/node_modules
```

## AddOns

These are the AddOns that I literally install in every project.

> Hint: Install only AddOns that you really need, because every AddOn could be a potential security risk and when updating, every AddOn can cause trouble.

- **cke5** - A good WYSIWYG editor.
- **developer** - Allows the editing of modules and templates with an editor or development environment.
- **global_settings** - Allows global settings and global content for your site.
- **mForm** - Allows the programming of forms in PHP without HTML.
- **mBlock** - Create multiple data blocks within a module.
- **yForm** - The Redaxo database, forms and email templating tool.
- **yRewrite** - SEO and pretty URLs 

### global_settings

Use global settings in your modules and templates

```php
$value = rex_global_settings::getValue("fieldName");
```

To use cke5 in global settings, use `textarea` and set the `HTML-Attribute` to

    class="cke5-editor" data-profile="profileName"

### mForm

- https://www.redaxo.org/doku/master/formulare
- https://www.redaxo.org/doku/master/redaxo-variablen

#### Input

```php+HTML
<?php
$mForm = new MForm();
$mForm->addSelectField(1, ['value1' => 'OPTION1', 'value2' => 'OPTION2'], ['label' => 'LABEL']);
$mForm->addTextField(2, ['label' => 'LABEL']);
$mForm->addTextAreaField(3, ['label' => 'LABEL', "rows" => "ROW_COUNT"]);
$mForm->addTextAreaField(4, ['class' => 'cke5-editor', 'data-lang' => \Cke5\Utils\Cke5Lang::getUserLang(), 'data-profile' => 'shaack-default']);
$mForm->addMediaField(5, ['label' => 'LABEL']);
$mForm->addLinkField(6, ['label' => 'LABEL']);
$mForm->addCheckboxField(7, ['label' => 'LABEL']);
echo $mForm->show();
```

#### Output

```php+HTML
<?php
$selectValue = 'REX_VALUE[1]';
$textValue = 'REX_VALUE[2]';
$textareaValue = 'REX_VALUE[3]';
$htmlValue = 'REX_VALUE[id="4" output="html"]';
$imageFileValue = 'REX_MEDIA[5]';
$linkArticleId = intval('REX_LINK[6]', 10);
$checkboxValue = !!'REX_VALUE[7]';
```
See also: https://www.redaxo.org/doku/main/redaxo-variablen

##### Output via ia PHP 

```php
$slice = $this->getCurrentSlice();

$slice->getValue(1);
$slice->getMedia(1);
$slice->getMediaUrl(1);
$slice->getLinklist(1);
$slice->getLinklist(1);
$slice->getLinkUrl(1);
$slice->getMedialist(1); 
$slice->getValueArray(1); // Alternative für rex_var::toArray('REX_VALUE[1]')
$slice->getMediaListArray(1); // Medialist als Array
$slice->getLinkListArray(1); // Linklist als Array
```

### yForm

- Field types: https://github.com/yakamara/redaxo_yform_docs/blob/master/de_de/yform_modul_values.md
- Snippets: https://friendsofredaxo.github.io/tricks/addons/yform/snippets

### yRewrite

- Don't forget to run the **Setup** after installation, which creates the `.htaccess` file.  

#### Anti-Spam

```html
hidden|astest|astest|REQUEST|no_db
html|antiscript|<script>document.getElementById("yform-formular-astest").value = "7d0"</script>
validate|compare_value|astest|7d0|!=|Ihre Anfrage konnte nicht gesendet werden
```

#### Login Formular

Create a Validator, see: lib/yform/validate/empty.php

#### CKE5 Textarea

Individual Attributes

```
{"class":"cke5-editor", "data-profile":"shaack-light"}
```

#### Individual Table formatting

```php
if (rex::isBackend() && rex_request('table_name')) {
    rex_extension::register('YFORM_DATA_LIST', function ($ep) {
        $list = $ep->getSubject();
        $list->setColumnFormat('published', 'custom', function ($params) {
            if($params['list']->getValue('published')) {
                return "<span class='text-success'><b>Ja</b></span>";
            } else {
                return "<span class='text-danger'>Nein</span>";
            }
        });
        $list->setColumnFormat('title', 'custom', function ($params) {
            return $params['list']->getValue('title');
        });
    });
}
```

## Starter Template

```php
<?php
$v = "2203181323";
$article = rex_article::getCurrent();
?>
<!doctype html>
<html lang="<?= rex_clang::getCurrent()->getCode() ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/node_modules/@fortawesome/fontawesome-free/css/all.min.css?v=<?= $v ?>"/>
    <link rel="stylesheet" href="/node_modules/cookie-consent-js/src/cookie-consent.css?v=<?= $v ?>"/>
    <link rel="stylesheet" href="/assets/local/styles/screen.css?v=<?= $v ?>"/>
    <title>[Page Title]</title>
</head>
<body>
<header>
    <nav class="navbar navbar-expand-md navbar-light border-1 border-dark border-bottom px-1">
        <div class="container-fluid">
            <a class="navbar-brand" href="/">[Logo]</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <?php
                /** @var rex_bootstrap_navigation $nav */
                $nav = rex_bootstrap_navigation::factory();
                $nav->addFilter("cat_hide_in_main_nav", "|true|", "!=");
                $nav->show(0, 1, true, true);
                ?>
            </div>
        </div>
    </nav>
</header>
<main>
    REX_ARTICLE[]
</main>
<footer>
    <div class="container-fluid">
    <div class="nav-footer-main"><?php echo ShRexBootstrapNavigation::renderCols(); ?></div>
    <div class="nav-footer-service"><?= ShRexBootstrapNavigation::renderChildsInline(rex_global_settings::getValue("serviceCategory")) ?></div>
    </div>
</footer>
<script src="/node_modules/bootstrap/dist/js/bootstrap.bundle.min.js?v=<?= $v ?>"></script>
<script src="/node_modules/webtools-js/src/webtools.js?v=<?= $v ?>"></script>
<script src="/node_modules/cookie-consent-js/src/cookie-consent.js?v=<?= $v ?>"></script>
<script src="/assets/local/scripts/project.js?v=<?= $v ?>"></script>
<?php
$hideCookieBanner = ShRexUtils::csvToArray(rex_global_settings::getValue("hideCookieBanner"));
$privacyPolicyArticle = rex_article::get(rex_global_settings::getValue("privacyPolicyArticle"));
?>
<script>
    if (navigator.userAgent.indexOf("Chrome-Lighthouse") === -1) {
        window.cookieConsent = new CookieConsent({
            lang: "<?= rex_clang::getCurrentId() == 1 ? 'de' : 'en' ?>",
            contentUrl: "/node_modules/cookie-consent-js/cookie-consent-content",
            autoShowModal: <?= in_array($article->getId(), $hideCookieBanner) ? "false" : "true" ?>,
            privacyPolicyUrl: "<?= $privacyPolicyArticle ? $privacyPolicyArticle->getUrl() : "privacy-policy" ?>"
        })
    }
    wt.Utils.openExternalLinksBlank()
</script>
</body>
</html>

```
## Media Manager

### WIDTH x HEIGHT

- **Bild: Skalieren** WIDTH, HEIGHT, minimum, enlarge
- **Bild: Beschneiden** WIDTH, HEIGHT, -, -, center, middle

## Add CSS to the backend

    rex_view::addCssFile('../assets/local/style/backend.css');

## Commonly used API functions

### Get all Child-Categories of a Category

```php
public static function getChildCategories($parentCategoryId = null) {
    if (!$parentCategoryId) {
        return rex_category::getRootCategories(true);
    } else {
        return rex_category::get($parentCategoryId)->getChildren(true);
    } 
} 
```

## Global Configuration

In project/package.yaml

```
load: early
config:
	property_1: ...
```

read with

```
rex_addon::get('project')->getProperty('config')['property_1']
```

## create an AddOn

https://github.com/FriendsOfREDAXO/demo_addon

## Extension Points

https://www.redaxo.org/doku/master/extension-points

```php
// Saving a YForm
rex_extension::register('REX_YFORM_SAVED', function (rex_extension_point $ep) {
    $form = $ep->getParams()['form'];
    $mainTable = $form->params['main_table'];
    if ($mainTable == 'rex_ycom_user') {
        $id = $form->params['main_id'];
        UserService::updateAddressesGeoCodes($id);
    }
});

// Request-Manipulation (SEO)
rex_extension::register('PACKAGES_INCLUDED', function ($params) {
    \rex_addon::get('structure')->setProperty('article_id', 31); // immer Artikel id=31 anzeigen
}, rex_extension::EARLY);

// Medien nach Updatedate sortieren
if (rex::isBackend() && rex::getUser()) {
    rex_extension::register('MEDIA_LIST_QUERY', function (rex_extension_point $ep) {
        $subject = $ep->getSubject();
        // echo $subject . "<br/>";
        $subject = str_replace("f.updatedate", "f.med_publication_date desc, f.updatedate", $subject);
        // $subject = str_replace("asc", "desc", $subject);
        // echo $subject;
        return $subject;
    });
}

// YForm Tabelle Formatierung "Ja/Nein"
if (rex::isBackend() && rex_request('table_name')) {
    rex_extension::register('YFORM_DATA_LIST', function ($ep) {
        $list = $ep->getSubject();
        $list->setColumnFormat('published', 'custom', function ($params) {
            if ($params['list']->getValue('published')) {
                return "<span class='text-success'><b>Ja</b></span>";
            } else {
                return "<span class='text-danger'>Nein</span>";
            }
        });
        $list->setColumnFormat('title', 'custom', function ($params) {
            return $params['list']->getValue('title');
        });
    });
}

// really_offline_articles
if (!rex::isBackend() && !rex_backend_login::hasSession()) {
    rex_extension::register('PACKAGES_INCLUDED', function () {
        $article = rex_article::getCurrent();
        if ($article instanceof rex_article && isArticleOffline($article)) {
            rex_redirect(rex_article::getNotfoundArticleId(), rex_clang::getCurrentId());
        }
    }, rex_extension::LATE);
}
function isArticleOffline(rex_article $article)
{
    $parent = $article->getParent();
    if($article->getValue('status') == 0) {
        return true;
    } else if($parent) {
        return isArticleOffline($parent);
    } else {
        return false;
    }
}
```

## Tricks

https://friendsofredaxo.github.io/tricks/

### Load Scripts at the body bottom

In the Template

```php
<?php
global $scripts;
if(@$scripts) {
    foreach ($scripts as $script) {
        echo $script;
    }
}
?>
```

In the Module

```php
global $scripts;
if (empty($scripts)) {
    $scripts = [];
}
$scripts[] = <<<EOF
<script>
    // your script
</script>
EOF;
```

### Is user logged in backend

https://redaxo.org/forum/allgemeines-r4-f27/im-backend-eingeloggt-t18439.html

```
$_SESSION[$REX['INSTNAME']]['UID']
```

### Backend stylesheet

In `project/boot.php`

```php
rex_view::addCssFile('../assets/local/styles/backend.css');
```

### Simple SEO-URLs

In `project/boot.php`

```php
rex_extension::register('PACKAGES_INCLUDED', function ($params) {
    $url = $_SERVER['REQUEST_URI'];
    // find out url path to article
    $rewriteArticles = ShRexUtils::csvToArticles(rex_global_settings::getValue("rewrite_articles"));
    foreach ($rewriteArticles as $rewriteArticle) {
        $articleUrl = $rewriteArticle->getUrl();
        if (str_starts_with($url, $rewriteArticle->getUrl())) {
            \rex_addon::get('structure')->setProperty('article_id', $rewriteArticle->getId());
            global $articleDbId;
            $articleDbId = intval(explode("/", substr($url, strlen($articleUrl)))[0]);
            return;
        }
    }
}, rex_extension::LATE);
```

See also [Bootstrap](Bootstrap), [npm](npm)

### Copy all pages and structure from one language to another

- Try the AddOn `Sprog`

### Use data from a slice in the template header

- Below `REX_ARTICLE[]` the data of the slice is available.
- To use it in the header you can render the article with `$cur_content = $this->getArticle()` into a variable above 
  the header.

Use `setProperty()` to set a property in the slice and read it in the template.

```
$project = rex_addon::get('project');
$project->setProperty('key',"wert")`
```

### Suppress PHP deprecated warnings

Configure the PHP error reporting on top of the main template.

```
error_reporting(E_ALL & ~E_DEPRECATED);
```

### What if mediapool shows no images

- Is the `.htaccess` of yrewrite installed?

### Multi domain setup with Redaxo

- Possible with [yrewrite](https://github.com/yakamara/redaxo_yrewrite).

### Migrate Redaxo 4 to 5

- https://redaxo.org/doku/main/upgrade-v4-v5

