# Webserver and Mailserver with Python

### Simple HTTP server with python

    python -m SimpleHTTPServer

or with python 3

    python3 -m http.server

### SMTP server for debugging email sending

    python -m smtpd -c DebuggingServer -n localhost:8025