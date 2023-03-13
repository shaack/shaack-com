# CSS Flexbox

https://css-tricks.com/snippets/css/a-guide-to-flexbox/

## Container

Enables a flex context for its **direct** children.

```css
.container {
	display: flex;
}
```

### flex-direction

```css
.container {
  flex-direction: row | row-reverse | column | column-reverse;
}
```

### flex-wrap

```css
.container {
  flex-wrap: nowrap | wrap | wrap-reverse;
}
```

### justify-content

```css
.container {
  justify-content: flex-start | flex-end | center | space-between | space-around | space-evenly;
}
/* 
flex-start          [[--][-][--]            ]
flex-end            [            [--][-][--]]
center              [      [--][-][--]      ]
space-between       [[--]      [-]      [--]]
space-around        [  [--]    [-]    [--]  ]
space-eventy        [   [--]   [-]   [--]   ]
*/
```

### align-items

```css
.container {
  align-items: stretch | flex-start | flex-end | center | baseline | first baseline | last baseline | start | end | self-start | self-end;
}
/*
stretch             # # # # 
                    # # # #
                    # # # #

flex-start          # # # # 
                    # #   #
                    #

flex-end            #
                    # #   #
                    # # # #
*/
```

### align-content

```css
.container {
  align-content: flex-start | flex-end | center | space-between | space-around | space-evenly | stretch;
}
```

## See also

- [CSS](CSS)
- [CSS-Animations](CSS-Animations)


