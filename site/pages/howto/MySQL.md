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

## Enable the general log to log all SQL statements

In the configuration file `my.cnf`, add the following line

```
general_log_file = /var/log/mysql_access.log
```

### Start the logging with

```
SET global general_log = 1;
```

## Generate a random 16 char hexadezimal value

```sql
SELECT LEFT(MD5((SELECT UUID())), 16);
```
=> `d5e902d58184e43d`

## Generate a random kind of base62 id

```sql
SELECT REPLACE(REPLACE(LEFT(TO_BASE64(RANDOM_BYTES(16)), 12), '+', LEFT(UUID(), 1)), '/', LEFT(UUID(), 1))
```
=> `8UgoRigMWY9g`

Replace the "12" to adjust the length of the id.

## See also

- [MAMP-Pro](MAMP-Pro)
