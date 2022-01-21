# Control access to a web page via htpasswd

1. Create a user in the htpasswd

```
> htpasswd -c .htpasswd username
New password: 
Re-type new password: 
Adding password for user username
> cat .htpasswd 
username:$apr1$BiOIHeaO$STWAx0jyCcwrqcREs4zCS1
```

2. Configure the access in the `.htaccess` file

```
AuthType Basic
AuthName "Access restricted"
AuthUserFile /path/to/the/.htpasswd 
Require user username
```

## See also

- [apache htaccess](Apache-htaccess)