#!/bin/sh

# The $PORT environment variable is supplied by Cloud Run (defaults to 8080).
PORT=${PORT:-8080}

echo "Starting Nginx on port ${PORT} and PHP-FPM (via socket)..."

# Dynamically update the Nginx configuration to listen on the required $PORT
# IMPORTANT: Use the file path from the updated Dockerfile (/etc/nginx/http.d/default.conf)
sed -i "s|listen 8080;|listen ${PORT};|" /etc/nginx/http.d/default.conf

# **CRITICAL FIX**: Update the PHP-FPM configuration (www.conf) to listen on the Unix socket.
sed -i 's/^listen = .*$/listen = \/var\/run\/php-fpm.sock/' /usr/local/etc/php-fpm.d/www.conf

# Create the directory for the socket and ensure correct permissions
mkdir -p /var/run 
chown -R www-data:www-data /var/run

# Ensure web root permissions are correct before starting services
chown -R www-data:www-data /var/www/html/public

# Start PHP-FPM in the background
php-fpm

# Start Nginx in the foreground. This process is the main one and keeps the container alive.
exec nginx -g "daemon off;"