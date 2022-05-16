# shell script

## date

```shell
# put current date as yyyy-mm-dd in $date
# -1 -> explicit current date, bash >=4.3 defaults to current time if not provided
# -2 -> start time for shell
printf -v date '%(%Y-%m-%d)T\n' -1 

# put current date as yyyy-mm-dd HH:MM:SS in $date
printf -v date '%(%Y-%m-%d %H:%M:%S)T\n' -1 

# to print directly remove -v flag, as such:
printf '%(%Y-%m-%d)T\n' -1
# -> current date printed to terminal
```

From: https://stackoverflow.com/questions/1401482/yyyy-mm-dd-format-date-in-shell-script

See also: [shell password generation](shell-password-generation)