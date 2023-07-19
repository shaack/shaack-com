# Bootstrap 5

## Install

### local via npm

```shell
npm install bootstrap@latest-5
```

```html
<link rel="stylesheet" href="/node_modules/bootstrap/dist/css/bootstrap.min.css"/>
<script src="/node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
```

### via CDN

```html
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
      integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
```

You find the latest version at [bootstrapcdn.com](https://www.bootstrapcdn.com).

### Bootstrap starter template

```php
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title><?php // TODO Page title ?></title>
</head>
<body>

    <?php // TODO Body content ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
</body>
</html>
```

## Integrate Bootstrap with scss

- https://getbootstrap.com/docs/5.0/customize/sass/
- https://www.mugo.ca/Blog/How-to-customize-Bootstrap-4-using-Sass

```scss
@import "fonts"; // load additional web fonts
@import "config/colors"; // set values for the colors
@import "config/variables"; // set values for further bootstrap variables
@import "../../node_modules/bootstrap/scss/bootstrap.scss"; // include bootstrap
@import "utils"; // my own utils, small helper classes, mixins
@import "globals"; // globals and bootstrap things, that can not be handled via configuration
@import "header"; // css for the navigation and header
@import "footer"; // css for the page footer
@import "blocks"; // one scss file for every "block" (aka section or module) in your layout or CMS
```

## Read a Bootstrap breakpoint or max-width value

```css
$breakpoint-sm: map-get($grid-breakpoints, sm); 
```

```css
.max-width-sm {
  max-width: map-get($container-max-widths, sm);
}
```

## Mixin to create a max-width util

```scss
@each $name, $value in $grid-breakpoints {
  .max-width-#{$name} {
    max-width: $value;
  }
}
```

## Tricks

### Align text or button at the bottom of a card

1. Add `d-flex` and `flex-column` to `card-body`
2. Add `mt-auto` to the element in `card-body`

### Align cols on bottom of a row

- Add `align-items-end` to the row

## Disable the Grid-System

- https://medium.com/@erik_flowers/how-youve-been-getting-the-bootstrap-grid-all-wrong-and-how-to-fix-it-6d97b920aa40

## Navigation on Hover

- https://bootstrap-menu.com/detail-basic-hover.html
