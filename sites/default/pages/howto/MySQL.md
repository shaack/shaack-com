# MySQL

## Dump

### Create a MySQL dump file

```
mysqldump -u$DBUSER -p$DBPASSWD -h$DBHOST $DATABASE > $FILENAME
```

### Read a MySQL dump file

```
mysql -u $DBUSER -p$DBPASSWD -h$DBHOST --database=$DATABASE < $FILENAME
```

## Repair a database

```
mysqlcheck -u $DBUSER -p --auto-repair --check $DATABASE
```

## Log every query

### Configure the logfile in `my.cnf`

```
general_log_file = /tmp/mysql.log
```

### Start the logging with

```
SET global general_log = 1;
```
