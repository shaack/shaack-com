# Content Security Policy (CSP)

"Content Security Policy (CSP) is an added layer of security that helps to detect and mitigate certain types of attacks,
including Cross-Site Scripting (XSS) and data injection attacks."<br/>
https://developer.mozilla.org/en-US/docs/Web/HTTP/CSP

## Enable CSP

Send the [Content-Security-Policy](https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Content-Security-Policy)
  HTTP header via `.htaccess` file

```
Header set Content-Security-Policy "default-src 'self';"
```

or use a `<meta>` element as shown here

```
<meta http-equiv="Content-Security-Policy" content="default-src 'self';" />
```

See also: [Discussion about CSP in HTTP header vs CSP in meta tag on Stackoverflow](https://stackoverflow.com/questions/56007473/why-is-delivery-of-content-security-policy-via-headers-preferred)

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
default-src 'none'; script-src 'self'; connect-src 'self'; img-src 'self'; style-src 'self';base-uri 'self';form-action 'self';
```

## How to handle inline scripts

### a) With nonces

- Generate the nonce on server site every request. 
- Length should be > 128bit.

```
script-src 'nonce-${cspNonce}'
```

```js
<script nonce="${cspNonce}">
    const inline1 = "Hello";
</script>
<script nonce="${cspNonce}">
    const inline2 = "Nonces";
</script>
```

### b) With hashes

```
script-src 'sha256-tk2RMpooRG6MsiJVeTM37W8UhPMYIPoh6O2rqMnTyH4=' 'sha256-NZBfn5BmBvL+v41TgdkGknEcbpovV8wWu4gYsqxtk00='
```

```js
<script>
    const inline1 = "Hello";
</script>
<script>
    const inline2 = "Hashes";
</script>
```
## CSP with AdSense is not possible

- https://support.google.com/adsense/thread/102839782/content-security-policy-csp-settings-for-adsense
- https://stackoverflow.com/questions/34669075/can-content-security-policy-be-made-compatible-with-google-analytics-and-adsense
