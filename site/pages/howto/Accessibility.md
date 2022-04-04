# Accessibility

- [https://wiki.selfhtml.org/wiki/HTML/Attribute/aria-*](https://wiki.selfhtml.org/wiki/HTML/Attribute/aria-*)

## Hide only for Screens (Screenreader only)

- BS 4: `.sr-only`
- BS 5: `.visually-hidden`

The original code from Bootstrap 5:

```css
.visually-hidden,
.visually-hidden-focusable:not(:focus):not(:focus-within) {
    position: absolute !important;
    width: 1px !important;
    height: 1px !important;
    padding: 0 !important;
    margin: -1px !important;
    overflow: hidden !important;
    clip: rect(0, 0, 0, 0) !important;
    white-space: nowrap !important;
    border: 0 !important; }
```

See also: https://webaim.org/techniques/css/invisiblecontent/

## aria-hidden

Adding `aria-hidden="true"` to an element removes that element and all of its children from the accessibility tree. This can improve the experience for assistive technology users by hiding:

- Purely decorative content, such as icons or images
- Duplicated content, such as repeated text
- Offscreen or collapsed content, such as menus

## Aria labelling

```html
<div role="dialog" aria-labelledby="dialogheader">
    <h2 id="dialogheader">Choose a File</h2>
    ... Dialog contents
    <button aria-label="close" aria-describedby="descriptionClose"
            onclick="myDialog.close()">X</button>
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

## Role Attribute

### Definition of roles

https://www.w3.org/TR/2014/REC-wai-aria-20140320/roles#role_definitions

