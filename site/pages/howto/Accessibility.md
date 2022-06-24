# Accessibility

- [What is accessibility?](https://developer.mozilla.org/en-US/docs/Learn/Accessibility/What_is_accessibility)
- [Accessibility Developer Guide](https://www.accessibility-developer-guide.com)

## Checklist

- Every page should have a meaningful title, like "BRAND, PAGE_NAME" e.g. "chessmail, Lobby"
- Use [Landmarks](https://webaim.org/techniques/aria/#landmarks) &lt;header>, &lt;nav>, &lt;main>, &lt;footer>...
- Pages should have a correct heading structure
- Every page should have an &lt;H1>, which in worst case could be visually hidden
- Insert a ["skip to main content" link](https://css-tricks.com/how-to-create-a-skip-to-content-link/) as first element
  in your page
- Make all interactive page elements accessible via "tab"

## What is the most used screen-reader

Test your web pages with the most used screen reader, it is Apples "Voice Over". "Voice Over"
is build into every Mac, iPad and iPhone.

> Testing your web pages with "Voice Over", will open your eyes.

## Accessible SVG

- https://www.sitepoint.com/tips-accessible-svg/

## ARIA-Attributes

- [https://wiki.selfhtml.org/wiki/HTML/Attribute/aria-*](https://wiki.selfhtml.org/wiki/HTML/Attribute/aria-*)

## Does a logo needs an alt-text?

- https://www.a11yproject.com/posts/alt-text/

## How to label links

- https://www.deque.com/blog/text-links-practices-screen-readers/

## "skip to content" link

- https://css-tricks.com/how-to-create-a-skip-to-content-link/

## Do screen readers read the page title?

- https://webaim.org/techniques/screenreader/

## "Visually hidden" is the new "screenreader only"

The css code for `.visually-hidden`

```css
.visually-hidden {
    position: absolute;
    left: -10000px;
    top: auto;
    width: 1px;
    height: 1px;
    overflow: hidden;
}
```

See also: https://webaim.org/techniques/css/invisiblecontent/

## aria-hidden

Adding `aria-hidden="true"` to an element removes that element and all of its children from the accessibility tree. This
can improve the experience for assistive technology users by hiding:

- Purely decorative content, such as icons or images
- Duplicated content, such as repeated text
- Offscreen or collapsed content, such as menus

## Aria labelling

```html

<div role="dialog" aria-labelledby="dialogheader">
    <h2 id="dialogheader">Choose a File</h2>
    ... Dialog contents
    <button aria-label="close" aria-describedby="descriptionClose"
            onclick="myDialog.close()">X
    </button>
    ...
    <div id="descriptionClose">
        Beim Schließen diese Fensters werden eigegebenen Daten verworfen.
        Sie werden zur Hauptseite zurückgeleitet.
    </div>
</div>
```

- `aria-labelledby`: id of the label
- `aria-describedby`: id of the description (optional)
- `aria-label`: The label, should be in the websites language

## Newline in alt attribute or title

### HTML

```html
<img src="image.jpg" alt="Line 1
Line 2"/>
```

### CSS

```css
img {
    white-space: pre
}
```

## Role Attribute

### Definition of roles

https://www.w3.org/TR/2014/REC-wai-aria-20140320/roles#role_definitions
