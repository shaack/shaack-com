# Composer

1. Enables you to declare the libraries you depend on. 
2. Finds out which versions of which packages need to be installed, and downloads them into your project. 
3. Allows you to update all your dependencies with one command.

https://getcomposer.org/doc

## Initialize a project for usage with composer

    composer init

## Install a specific dependency

    composer require [vendor]/[package name]

## Install dependencies from `composer.json`

    composer install

## Update dependencies to their latest versions

    composer update

## Autoloading

https://getcomposer.org/doc/01-basic-usage.md#autoloading

### To refresh the auto-loading information 

    composer dump-autoload

## Example `composer.json`

```json
{
  "name": "shaack/reboot-cms",
  "authors": [
    {
      "name": "shaack",
      "homepage": "https://shaack.com"
    }
  ],
  "repositories": [
    {
      "type": "vcs",
      "url": "https://github.com/shaack/reboot-cms"
    }
  ],
  "version": "2.3.1",
  "description": "A nice flat file CMS. See https://github.com/shaack/reboot-cms",
  "require": {
    "ext-json": "*",
    "ext-fileinfo": "*",
    "ext-dom": "*",
    "erusev/parsedown": "^1.7",
    "symfony/yaml": "^4.1",
    "whitehat101/apr1-md5": "~1.0"
  },
  "autoload": {
    "psr-4": {
      "": "core/src/"
    }
  },
  "keywords": ["cms", "flat file","php", "bootstrap", "markdown"]
}
```

- `"ext-json": "*"` is needed to declare standard PHP extensions.
- `"autoload"` declares project folders to be recognized for autoloading.