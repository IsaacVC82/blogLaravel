#!/bin/bash
# start.sh

# Iniciar Nginx en segundo plano
service nginx start

# Iniciar PHP-FPM en primer plano
php-fpm