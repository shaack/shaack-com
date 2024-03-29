# CSS

## Display outlines for all elements on hover (simplifies development)

```css
body *:hover {
    outline: 1px rgba(0, 0, 0, 0.2) solid;
}
```

## Center content

```css
.center-content {
    display: flex;
    justify-content: center;
    align-content: center;
    flex-direction: column;
}
```

## Place Text over an image

- https://www.w3schools.com/howto/howto_css_image_text.asp

```html

<div class="container">
    <img src="image.jpg" alt="An image" style="width:100%">
    <div class="bottom-left">Bottom Left</div>
    <div class="top-left">Top Left</div>
    <div class="top-right">Top Right</div>
    <div class="bottom-right">Bottom Right</div>
    <div class="centered">Centered</div>
</div>
```

```css
.container {
    position: relative;
    text-align: center;
    color: white;
}

.bottom-left {
    position: absolute;
    bottom: 8px;
    left: 16px;
}

.top-left {
    position: absolute;
    top: 8px;
    left: 16px;
}

.top-right {
    position: absolute;
    top: 8px;
    right: 16px;
}

.bottom-right {
    position: absolute;
    bottom: 8px;
    right: 16px;
}

.centered {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
}
```

## Scrollbar styling

```css
::-webkit-scrollbar, ::-webkit-scrollbar-corner {
    background: blue;
}

::-webkit-scrollbar-thumb {
    background: black;
}
```

## See also

- [CSS Flexbox](CSS-Flexbox)
- [CSS Animations](CSS-Animations)