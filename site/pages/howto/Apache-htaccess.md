# Apache .htaccess configuration

## Redirect / Rewrite

### Redirect www. to non-www

```
RewriteEngine On

RewriteCond %{HTTP_HOST} ^(www\.)(.*) [NC]
RewriteRule (.*) https://%2$1 [L,R=301]
```

### Redirect http to https

https://stackoverflow.com/questions/4083221/how-to-redirect-all-http-requests-to-https

#### Variant 1
```
RewriteCond %{HTTPS} !=on
RewriteRule ^/?(.*) https://%{SERVER_NAME}/$1 [R=301,L]
```
#### Variant 2
```
RewriteCond %{SERVER_PORT} !^443$
RewriteRule (.*) https://%{HTTP_HOST}/$1 [R=301,L]
```

### Logging 
```
RewriteLog /var/log/httpd/shop_rewrite.log
RewriteLogLevel 3
```

## Fancy indexing

```
IndexOptions FancyIndexing
IndexOrderDefault Ascending Date
AddType text/plain .eml
```

## Access management

Deny folder access for all web requests.

```
Deny from all
```

## Error pages

```
ErrorDocument 404 /404.html
```

## See also

- [htpasswd](htpasswd)