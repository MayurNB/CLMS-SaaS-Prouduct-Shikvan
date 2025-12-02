#!/bin/bash

PORT=${PORT:-8080}

echo "Starting PHP-FPM..."
php-fpm -D

echo "Starting Nginx on port ${PORT}..."
/usr/sbin/nginx -g "daemon off;"
