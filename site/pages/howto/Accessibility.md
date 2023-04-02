# Accessibility

- [What is accessibility?](https://developer.mozilla.org/en-US/docs/Learn/Accessibility/What_is_accessibility)
- [WebAIM articles](https://webaim.org/articles/)
- [Accessibility Developer Guide](https://www.accessibility-developer-guide.com)
- [Apple accessibility guide](https://www.apple.com/de/accessibility/)

## Checklist

- Every page should have a meaningful title, like "BRAND, PAGE_NAME" e.g. "chessmail, Lobby"
- Use [Semantic Structure](https://webaim.org/techniques/semanticstructure/), Regions and Landmarks
- Pages should have a correct heading structure
- Every page should have an &lt;H1>, which in worst case could be visually hidden
- Make all interactive page elements accessible via "tab"

## Test your pages with a screen-reader

Test your web pages with the most used screen reader, it is Apples "Voice Over" and
is build into every Mac, iPad and iPhone.

- [Voiceover guide](https://support.apple.com/guide/voiceover/welcome/mac)
- [Voiceover key mapping](https://help.apple.com/voiceover/command-charts/)

## Other testing tools

- [Accessibility Insights for Web](https://chrome.google.com/webstore/detail/accessibility-insights-fo/pbjjkligggfmakdaogkfomddhfmpjeni/related)
- [Google Lighthouse - Test Accessibility and SEO Parameters](https://developer.chrome.com/docs/lighthouse/overview/)
- [WAVE Web Accessibility Evaluation Tools](https://wave.webaim.org/)
- [axe® - The Standard in Accessibility Testing](https://www.deque.com/axe/)

## Use the accessibility tools in Google Chrome

Within the Developer Tools, you can find the "Elements" tab which comprises of sub-tabs like "Styles," "Computed,"
and "Accessibility." If you are unable to locate the "Accessibility" tab, it may be hidden behind the "More tabs"
icon "»". Click on the "Accessibility" tab. In the "Accessibility Tree" section, you can
activate the "Enable full-page accessibility tree" option.

Once enabled, you will notice a person-icon within the "Elements" pane. Clicking on this icon will allow you to switch
to the accessibility tree of the page.

## Accessible SVG

- https://www.sitepoint.com/tips-accessible-svg/

## ARIA-Attributes

- [https://wiki.selfhtml.org/wiki/HTML/Attribute/aria-*](https://wiki.selfhtml.org/wiki/HTML/Attribute/aria-*)

## Does a logo needs an alt-text?

- https://www.a11yproject.com/posts/alt-text/

## How to label links

- https://www.deque.com/blog/text-links-practices-screen-readers/

## Skip to content link is (sometimes) woefully incorrect

- https://github.com/facebook/docusaurus/issues/3917

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

## Forms

### Error messages in forms

- https://www.w3.org/WAI/tutorials/forms/notifications


## See also

- [Voice Over](Voice-Over)

