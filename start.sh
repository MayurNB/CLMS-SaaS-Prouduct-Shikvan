#!/bin/sh

# The $PORT environment variable is supplied by Cloud Run (defaults to 8080).
PORT=${PORT:-8080}

echo "Starting Nginx on port ${PORT} and PHP-FPM..."

# Dynamically update the Nginx configuration to listen on the required $PORT
# This ensures Nginx listens on the port dictated by Cloud Run (usually 8080)
sed -i "s|listen 8080;|listen ${PORT};|" /etc/nginx/conf.d/default.conf

# Start PHP-FPM in the background, listening on the default 9000 port
php-fpm

# Start Nginx in the foreground. Cloud Run requires the main CMD process to be in the foreground 
# so the container stays alive and responds to traffic on the required port.
exec nginx -g "daemon off;"