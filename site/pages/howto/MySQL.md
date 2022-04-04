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

## Error "Server returns invalid timezone. Need to set 'serverTimezone' property."

### Via user defined driver property

Set the user defined driver property `serverTimezone` to `UTC`.

### Via JDBC

Or set it in the JDBC connection string

    jdbc:mysql://localhost:3306/dbname?serverTimezone=UTC

## Log every query

### Configure the logfile in `my.cnf`

```
general_log_file = /tmp/mysql.log
```

### Start the logging with

```
SET global general_log = 1;
```
