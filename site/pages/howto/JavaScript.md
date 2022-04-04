# JavaScript

## read data attributes

```html
<div data-NAME="VALUE"></div>
```

```js
const value = this.dataset.NAME
```

## read css variables

```js
window.getComputedStyle(document.documentElement).getPropertyValue('--css-variable')
```