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
public static function getAllCategoriesInCategory($categoryId = null) {
    if (!$categoryId) {
        return rex_category::getRootCategories(true);
    } else {
        return rex_category::get($categoryId)->getChildren(true);
    } 
} 
```