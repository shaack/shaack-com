# HTML

## Minimal HTML5 standard skeleton

```html
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <title></title>
    <link rel="stylesheet" href="assets/styles/screen.css"/>
    <link rel="icon" href="favicon.ico"/>
</head>
<body>
<script src="assets/scripts/page.js"></script>
</body>
</html>
```

## Meta Tags

### Prevent robots from crawling and indexing

    <meta name="robots" content="noindex, nofollow" />

## Nested List

```html
<ul>
    <li>Coffee</li>
    <li>Tea
        <ul>
            <li>Black tea</li>
            <li>Green tea</li>
        </ul>
    </li>
</ul>
```

## Allowed chars in HTML-ids

`id` and `name` tokens must begin with a letter (`[A-Za-z]`) and may be followed by any number of letters, 
digits (`[0-9]`), hyphens (`-`), underscores (`_`), colons (`:`), and periods (`.`).

See also: [Content-Security-Policy](Content-Security-Policy)