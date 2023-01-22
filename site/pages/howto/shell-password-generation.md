# Different ways to generate passwords via shell commands

Tested in the macOS terminal.

    > openssl rand -base64 12
    FoY1eJgNZGjoSZx7

    > openssl rand -hex 8
    246d8fa6d1f3ef60

    > echo `openssl rand -base64 32 | head -c${1:-2};printf "_"; openssl rand -base64 32 | head -c${1:-6};perl -e 'print int(rand(10))';openssl rand -base64 32 | head -c${1:-6}; echo;` | sed -e 's/\//7/g'  | sed -e 's/\+/3/g'
    9N_CCVKnT6gH9TiO

See also: [shell script](shell-script)