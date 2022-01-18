# MySql

## activate the query log

### in my.cnf

```
general_log_file = /tmp/mysql.log
```

### start the logging with

```
SET global general_log = 1;
```

## dump

### create

```
mysqldump -u$DBUSER -p$DBPASSWD -h$DBHOST $DATABASE > $FILENAME
```

###  read

```
mysql -u $DBUSER -p$DBPASSWD -h$DBHOST --database=$DATABASE < $FILENAME
```

## repair a database

```
mysqlcheck -u $DBUSER -p --auto-repair --check $DATABASE
```