# Search files with grep and find

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

