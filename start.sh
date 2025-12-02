#!/bin/sh

# The $PORT environment variable is supplied by Cloud Run (defaults to 8080).
PORT=${PORT:-8080}

echo "Starting Nginx on port ${PORT} and PHP-FPM (via socket)..."

# Dynamically update the Nginx configuration to listen on the required $PORT
# This uses the default.conf that was copied in the Dockerfile
sed -i "s|listen 8080;|listen ${PORT};|" /etc/nginx/conf.d/default.conf

# **CRITICAL FIX**: Update the PHP-FPM configuration (www.conf) to listen on the Unix socket.
# We must ensure the listen directive is set to the socket path /var/run/php-fpm.sock
sed -i 's/^listen = .*$/listen = \/var\/run\/php-fpm.sock/' /usr/local/etc/php-fpm.d/www.conf

# Create the directory for the socket and ensure correct permissions
mkdir -p /var/run 
chown -R www-data:www-data /var/run

# Start PHP-FPM in the background
php-fpm

# Start Nginx in the foreground. This process is the main one and keeps the container alive.
exec nginx -g "daemon off;"