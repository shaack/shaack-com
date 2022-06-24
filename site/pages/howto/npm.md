# npm

## Prevent packages from being published

Set `"private": true` in your `package.json` and npm will refuse to publish it.

## Publish a beta version

1. Modify version in package.json to the following format `"version": "4.0.0-beta.0"` where beta.x is the beta version number
2. Publish to npm `npm publish --tag beta`

## A few standard packages

`npm install ...`

- [bootstrap](https://www.npmjs.com/package/bootstrap)
- [@fortawesome/fontawesome-free](https://www.npmjs.com/package/@fortawesome/fontawesome-free)
- [webtools-js](https://www.npmjs.com/package/webtools-js)
- [cookie-consent-js](https://www.npmjs.com/package/cookie-consent-js)

See also [Bootstrap](Bootstrap), [Git](Git)