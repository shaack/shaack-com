# MAMP Pro

https://documentation.mamp.info/en/MAMP-PRO-Mac/Settings/

## Enable general log to log all SQL statements

- Open the "Template" `my.cnf` (don't know, why they call it template)
- Add the following lines

```
general_log = 1
general_log_file = /var/log/mysql_access.log
```

Instead of setting the `general_log` parameter you also can use the following SQL statement to switch
the global log on and off.

```
SET global general_log = 1;
```

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

## See also

- [MySQL](MySQL)