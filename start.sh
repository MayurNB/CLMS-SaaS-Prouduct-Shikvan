#!/bin/sh

# The $PORT environment variable is supplied by Cloud Run (defaults to 8080).
PORT=${PORT:-8080}

echo "--- STARTUP DIAGNOSTIC: TESTING PHP-FPM ALONE ---"

# Dynamically update Nginx/PHP-FPM config paths (Standard setup)
sed -i "s|listen 8080;|listen ${PORT};|" /etc/nginx/conf.d/default.conf
sed -i 's/^listen = .*$/listen = \/var\/run\/php-fpm.sock/' /usr/local/etc/php-fpm.d/www.conf

# Ensure socket directory is owned by www-data
mkdir -p /var/run 
chown -R www-data:www-data /var/run

# === CRITICAL STEP: Execute PHP-FPM in the foreground (-F) ===
# This process MUST run in the foreground so the container stays alive (or logs the crash).
# We are intentionally not starting Nginx.
exec php-fpm -F