# Redaxo

## Standard AddOns

These are the AddOns that I literally install in every project.

> Hint: Install only AddOns that you really need, because every AddOn is a potential security risk and when updating, every AddOn can cause trouble.

### cke5

A good WYSIWYG editor.

### developer

Allows the editing of modules and templates with an editor or development environment.

### global_settings

Allows global settings and global content for your site.

### mForm

Allows the programming of forms in PHP without HTML.

### yForm

The Redaxo database, forms and email templating tool.

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



See also [Bootstrap](Bootstrap), [npm](npm)