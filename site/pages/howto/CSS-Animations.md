# CSS Animations

CSS animations are triggert, when an element or one of its parent element appears. For example, if the element or its
parent is set from `display=none` to `display=block`.

## Example

```css
.appear-from-right {
    position: relative;
    animation: appearFromRight 0.4s ease-out;
}

@keyframes appearFromRight {
    from {
        opacity: 0;
        left: 5rem;
    }
    to {
        opacity: 1;
        left: 0;
    }
}
```

## Animation properties

- `animation-name`: The name of the `@keyframes`
- `animation-duration`: How long an animation should take to complete
- `animation-delay`: A delay for the start of an animation
- `animation-timing-function`: The speed curve of the animation
  - Possible values: `linear`, `ease` (default), `ease-in`, `ease-out`, `ease-in-out`
- `animation-iteration-count`: The number of times an animation should run
- `animation-direction`: Whether an animation should be played forwards, backwards or in alternate cycles
  - Possible values: `normal`, `reverse`, `alternate`, `alternate-reverse`
- `animation-fill-mode`: Specifies a style for the target element when the animation is not playing (before it starts, after it ends, or both)
  - Possible values: `none`, `forwards`, `backwards`, `both` 

### Shorthand properties

    animation: name duration timit-function delay iteration-count direction;

Example

    animation: example 5s linear 2s infinite alternate;

## See also

- [CSS](CSS)
- [CSS Flexbox](CSS-Flexbox)
