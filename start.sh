#!/bin/sh

# The $PORT environment variable is supplied by Cloud Run (defaults to 8080).
PORT=${PORT:-8080}

echo "Starting Nginx on port ${PORT} and PHP-FPM (via socket)..."

# Dynamically update the Nginx configuration to listen on the required $PORT
# Path: /etc/nginx/conf.d/default.conf
sed -i "s|listen 8080;|listen ${PORT};|" /etc/nginx/conf.d/default.conf

# **CRITICAL FIX**: Update the PHP-FPM configuration (www.conf) to listen on the Unix socket.
sed -i 's/^listen = .*$/listen = \/var\/run\/php-fpm.sock/' /usr/local/etc/php-fpm.d/www.conf

# Ensure the directory for the socket is owned by www-data
mkdir -p /var/run 
chown -R www-data:www-data /var/run

# Start PHP-FPM in the background. It will run workers as www-data.
php-fpm

# Start Nginx in the foreground. 
exec nginx -g "daemon off;"