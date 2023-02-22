# npm

## Prevent packages from being published

Set `"private": true` in your `package.json` and npm will refuse to publish it.

## Publish a beta version

1. Modify version in package.json to the following format `"version": "4.0.0-beta.0"` where beta.x is the beta version number
2. Publish to npm `npm publish --tag beta`

See also [JavaScript](JavaScript), [Git](Git)