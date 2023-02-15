# Content Security Policy

"Content Security Policy (CSP) is an added layer of security that helps to detect and mitigate certain types of attacks,
including Cross-Site Scripting (XSS) and data injection attacks."<br/>
https://developer.mozilla.org/en-US/docs/Web/HTTP/CSP

## Enable CSP

- Send the [Content-Security-Policy](https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Content-Security-Policy)
  HTTP header
- Or use a `<meta>` element as shown here

```
<meta
  http-equiv="Content-Security-Policy"
  content="default-src 'self'; img-src https://*; child-src 'none';" />
```

## Examples

From https://content-security-policy.com/

### Allow everything but only from the same origin

```
default-src 'self';
```

### Allow Google Analytics, Google AJAX CDN and Same Origin

```
script-src 'self' www.google-analytics.com ajax.googleapis.com;
```

### Starter Policy

- Allows images, scripts, AJAX, form actions, and CSS from the same origin
- Does not allow any other resources to load (eg object, frame, media, etc)

```
default-src 'none'; script-src 'self'; connect-src 'self'; img-src 'self'; style-src 'self';base-uri 'self';form-action 'self'
```

## Configuration

### via `.htaccess` file

```
Header set Content-Security-Policy "default-src 'self';"
```

### via meta tag

```html
<meta http-equiv="Content-Security-Policy" content="default-src 'self'">
```

## How to handle inline scripts

### a) With nonces

```
script-src 'nonce-pDqo8Pxn5WK7wA1' 'nonce-MEBOsU8k5vBsc4'
```

```js
<script nonce="pDqo8Pxn5WK7wA1">
    const inline1 = "Hello";
</script>
<script nonce="MEBOsU8k5vBsc4">
    const inline2 = "Nonces";
</script>
```

### b) With hashes

```
script-src 'sha256-e3f505d5406865ce8ec012c5f9d4463ef1a05ea07ad517fa6e2710f4c1f2bd68' 'sha256-049a4ea6f291e81b1eee0be8ada1ec652a3dff6f4650a965a1350bb256911b38'
```

```js
<script>
    const inline1 = "Hello";
</script>
<script>
    const inline2 = "Hashes";
</script>
```

