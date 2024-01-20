# The macOS Terminal

## Recursively copy files and hidden files from one folder to another

The `.` is critical to make it working.

	cp -rv /from/folder/. /to/folder/

## Search files with grep and find

### Find files in or below the current folder containing a certain search term

    grep -R "search_term" *

### Find files with a certain extension, where these files contain a certain search term

    find . -type f -name \*.php -exec grep -il "search_term" {} \;

### Find files with certain extensions

    find . -regex ".*\(php\|html\|tpl\)$"

### As an alternative you could also use

    find . -iname "*.php" -or -iname "*.tpl" -or -iname "*.html"

### Find files larger than 1 GB

    find . -size +1G -exec ls -lh {} \;

### Count the number of send emails in /var/log/maillog

    cat /var/log/maillog | grep -v "relay=local" | grep "relay=" | grep "status=sent" | grep "May 10" | wc -l

