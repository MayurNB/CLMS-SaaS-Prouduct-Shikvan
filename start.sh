#!/bin/sh

# The $PORT environment variable is supplied by Cloud Run (defaults to 8080).
PORT=${PORT:-8080}

echo "Starting Nginx on port ${PORT} and PHP-FPM (via socket)..."

# Dynamically update the Nginx configuration to listen on the required $PORT
# Path: /etc/nginx/http.d/default.conf
sed -i "s|listen 8080;|listen ${PORT};|" /etc/nginx/http.d/default.conf

# **CRITICAL FIX**: Update the PHP-FPM configuration (www.conf) to listen on the Unix socket.
sed -i 's/^listen = .*$/listen = \/var\/run\/php-fpm.sock/' /usr/local/etc/php-fpm.d/www.conf

# Create the /var/run directory if necessary. Since the USER is www-data, it should have write permission to this path.
mkdir -p /var/run 

# Start PHP-FPM in the background. It will create the socket file.
php-fpm

# Start Nginx in the foreground. This process is the main one and keeps the container alive.
exec nginx -g "daemon off;"