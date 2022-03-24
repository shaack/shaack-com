# Redaxo

## AddOns

These are the AddOns that I literally install in every project.

> Hint: Install only AddOns that you really need, because every AddOn could be a potential security risk and when updating, every AddOn can cause trouble.

- **cke5** - A good WYSIWYG editor.
- **developer** - Allows the editing of modules and templates with an editor or development environment.
- **global_settings** - Allows global settings and global content for your site.
- **mForm** - Allows the programming of forms in PHP without HTML.
- **yForm** - The Redaxo database, forms and email templating tool.

### cke5 - Tabelle rex_cke5_profiles

```sql
INSERT INTO rex_cke5_profiles (lang_content, font_color, font_color_default, font_background_color, font_background_color_default, font_families, font_family_default, id, name, description, toolbar, heading, alignment, image_toolbar, fontsize, highlight, table_toolbar, rexlink, height_default, min_height, max_height, lang, mediaembed, mediatype, mediapath, mediacategory, upload_default, createdate, updatedate, createuser, updateuser) VALUES (null, null, null, null, null, null, null, 4, 'shaack-light', 'Default & Demo Profile', 'heading,|,bold,|,link,|,alignment,|,undo,redo', 'paragraph,h1,h2,h3', 'left,right,center,justify', 'imageTextAlternative,|,full,alignLeft,alignRight,alignCenter', 'tiny,small,big,huge', 'yellowMarker,greenMarker,redPen,greenPen', 'tableColumn,tableRow,mergeTableCells', 'internal,media', '|default_height|', 0, 0, 'de', null, '', '', 0, null, now(), now(), 'admin', 'admin');
INSERT INTO rex_cke5_profiles (lang_content, font_color, font_color_default, font_background_color, font_background_color_default, font_families, font_family_default, id, name, description, toolbar, heading, alignment, image_toolbar, fontsize, highlight, table_toolbar, rexlink, height_default, min_height, max_height, lang, mediaembed, mediatype, mediapath, mediacategory, upload_default, createdate, updatedate, createuser, updateuser) VALUES (null, null, null, null, null, null, null, 5, 'shaack-default', 'Default & Demo Profile', 'heading,|,bold,italic,bulletedList,numberedList,|,link,|,alignment,|,undo,redo,rexImage', 'paragraph,h1,h2,h3', 'left,right,center,justify', 'imageTextAlternative,|,full,alignLeft,alignRight,alignCenter', 'tiny,small,big,huge', 'yellowMarker,greenMarker,redPen,greenPen', 'tableColumn,tableRow,mergeTableCells', 'internal,media', '|default_height|', 0, 0, 'de', null, 'full-size', 'media/', 0, null, now(), now(), 'admin', 'admin');
```

### mForm

- https://www.redaxo.org/doku/master/formulare
- https://www.redaxo.org/doku/master/redaxo-variablen

#### Input

```php+HTML
<?php
$mForm = new MForm();
$mForm->addSelectField(1, ["large" => "Groß, mit Bild im Hintergrund", "small" => "Klein, mit freigestelltem Bild"], ['label' => 'Typ']);
$mForm->addTextField(2, ['label' => 'Überschrift']);
$mForm->addTextAreaField(3, ['label' => 'Text']);
$mForm->addTextAreaField(4, ['class' => 'cke5-editor', 'data-lang' => \Cke5\Utils\Cke5Lang::getUserLang(), 'data-profile' => 'shaack-default']);
$mForm->addMediaField(5, ['label' => 'Bild']);
$mForm->addLinkField(6, ['label' => 'Verlinkung intern']);
$mForm->addCheckboxField(7, ['label' => 'Hintergrund Grau']);
echo $mForm->show();
```

#### Output

```php+HTML
<?php
$type = 'REX_VALUE[1]';
$headline = 'REX_VALUE[2]';
$text = 'REX_VALUE[3]';
$html = 'REX_VALUE[id="4" output="html"]';
$image = 'REX_MEDIA[5]';
$articleId = intval('REX_LINK[6]', 10);
$externalLink = 'REX_VALUE[7]';
```

### yForm

- Field types: https://github.com/yakamara/redaxo_yform_docs/blob/master/de_de/yform_modul_values.md
- Snippets: https://friendsofredaxo.github.io/tricks/addons/yform/snippets

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
<html lang="<?= ShRedaxo::langCode() ?>">
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
$hideCookieBanner = ShRedaxo::csvToArray(rex_global_settings::getValue("hideCookieBanner"));
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

## Variables

- Text: `REX_VALUE[1]`, `REX_VALUE[id="1" output="html"]`
- Link: `REX_LINK[1]`, `REX_LINKLIST[1]`
- Media: `REX_MEDIA[1]`, `REX_MEDIALIST[1]`

See: https://www.redaxo.org/doku/main/redaxo-variablen

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

## Links

https://friendsofredaxo.github.io/tricks/

## .gitignore

```bash
/.idea
/redaxo/cache
/redaxo/data/core/system.log
/redaxo/data/core/config.yml
/media/*
/node_modules
*.css.map
```
## Doku

- Extension Points: https://www.redaxo.org/doku/master/extension-points

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

## create AddOn

https://github.com/FriendsOfREDAXO/demo_addon

## Extension Points

https://www.redaxo.org/doku/master/extension-points

```php
// Speichern einer YForm
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
        var images = $("#$id").find("img");
        for (var i = 0; i < images.length; i++) {
            var image = $(images[i]);
            var src = image.attr("src");
            src = src.replace("rex_media_type=Hero", "rex_media_type=Logo")
            image.on("load", function() {
                $(this).css("visibility", "visible").hide().fadeIn(250);
            }).attr("src", src);           
        }
    </script>
```

## Is Logged in Backend

https://redaxo.org/forum/allgemeines-r4-f27/im-backend-eingeloggt-t18439.html

```
$_SESSION[$REX['INSTNAME']]['UID']
```

## Backend stylesheet

in `project/boot.php`

```php
rex_view::addCssFile('../assets/local/styles/backend.css');
```


See also [Bootstrap](Bootstrap), [npm](npm)