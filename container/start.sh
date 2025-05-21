#!/bin/bash

# Inicia o PHP-FPM em segundo plano
php-fpm8.2 -D

# Inicia o Nginx no primeiro plano
nginx -g "daemon off;"