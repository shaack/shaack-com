# Different ways to generate passwords via shell commands

Tested in the macOS terminal.

    > openssl rand -base64 12
    FoY1eJgNZGjoSZx7

    > openssl rand -hex 8
    246d8fa6d1f3ef60

    > openssl rand -base64 8 | md5 | head -c16; echo
    be9a9d90c4ae73a3

    > date | md5 | head -c16; echo
    0bc70151c09e5745

See also: [shell script](shell-script.md)