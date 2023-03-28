# shell scripts

Mainly for the macOS terminal.

## Different ways to generate passwords via shell commands

    > openssl rand -base64 12
    FoY1eJgNZGjoSZx7

    > openssl rand -hex 8
    246d8fa6d1f3ef60

    > echo `openssl rand -base64 32 | head -c${1:-2};printf "_"; openssl rand -base64 32 | head -c${1:-6};perl -e 'print int(rand(10))';openssl rand -base64 32 | head -c${1:-6}; echo;` | sed -e 's/\//7/g'  | sed -e 's/\+/3/g'
    9N_CCVKnT6gH9TiO

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