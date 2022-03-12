# Craft CMS

- https://craftcms.com/docs/

## Install

In the root folder of your preoject.

```shell
composer self-update
composer create-project craftcms/craft
./craft setup
```

(See also: [MAMP, enable Composer](Composer))

Then set the web root folder to `/craft/web`.

## My base setup

### Plugins

Install plugins from the terminal

```shell
composer require package/name
```

### 

### npm

```shell
cd craft/web
npm init
npm install bootstrap
npm install webtools-js
```

.gitignore 
```gitignore
.idea
node_modules
```

Create a `_base.twig` template in `craft/templates`

```twig

```

