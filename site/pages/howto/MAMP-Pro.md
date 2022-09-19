# MAMP Pro

https://documentation.mamp.info/en/MAMP-PRO-Mac/Settings/

## Locate the MySQL Database in your file system

    /Library/Application Support/appsolute/MAMP PRO/db/mysql57

## Certificate problems under macOS

If the `MAMP_PRO_Root_CA` is not trusted, find it in the `Keychain Access` app and "Always trust" it there.

## Enable Composer

Under `Languages/PHP` check `Activate command line shortcuts for the selected PHP version, pear, pecl et al.` and
`also activate shortcut for Composer`. After that you can use the command `composer` from the terminal.

## See also

- [Composer](Composer)

## MySQL dumps

### Create a MySQL dump file

```
/applications/MAMP/library/bin/mysqldump -uroot -proot -hlocalhost $DATABASE > $FILENAME
```

### Read a MySQL dump file

```
/applications/MAMP/library/bin/mysql -u root -proot -hlocalhost --database=$DATABASE < $FILENAME
```

## Repair a database

```
/applications/MAMP/library/bin/mysqlcheck -u $DBUSER -p --auto-repair --check $DATABASE
```
