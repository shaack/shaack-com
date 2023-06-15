# JavaScript

## debugging

### console.log

There is more than just `console.log`, `console.error`, and `console.warn`.

```
Log             console.log("text")
Info            console.info("info")
Warning         console.warn("warning")
Error           console.error("error")
Placeholder     console.log("Hello %s!", "World")
Styling         console.log("%cThis is a blue text", "color: blue")
With condition  console.assert(a === 3, "a is not equal to 3")
Clean up        console.clear()
Grouping        console.group([name]) or console.groupCollapsed([name])
                console.groupEnd()
Counting        console.count([label])
Timing          console.time([label])
                console.timeLog([label])
                console.timeEnd([label])
```

See also [MDN, Console](https://developer.mozilla.org/en-US/docs/Web/API/console)

## undefined vs null

- `undefined` means the variable has been declared, but its value has not been assigned. 
- `null` means an empty value or a blank value.

See also: https://stackoverflow.com/questions/37980559/is-it-better-to-return-undefined-or-null-from-a-javascript-function

## Determine the dimensions of elements

### clientWidth, clientHeight

The size of the displayed content, including padding, without scrollbars and borders.

### scrollWidth, scrollHeight

The actual size of the content, regardless of how much of it is currently visible.

### offsetWith, offsetHeight

The width and height of an element, including borders, without margins. Ignores scaling.

### getBoundingClientRect()

Returns an object with the `left`=`x`, `top`=`y`, `right`, `bottom`, `width`, and `height`
properties of an element, including borders, without margins. Considers scaling, returns the
rendered size.

See
also: [MDN, Determining the dimensions of elements](https://developer.mozilla.org/en-US/docs/Web/API/CSS_Object_Model/Determining_the_dimensions_of_elements)

## Dynamically add an element

```js
const element = document.createElement("div")
element.appendChild(document.createTextNode("Loram Ipsum"))
context.appendChild(element)
```

## Read CSS variables

```js
window.getComputedStyle(document.documentElement).getPropertyValue('--css-variable')
```

## Promises

https://www.youtube.com/watch?v=DHvZLI7Db8E

