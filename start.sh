#!/bin/sh

PORT=${PORT:-8080}

echo "Starting Nginx on port ${PORT} and PHP-FPM (via socket)..."

# Dynamically update the Nginx configuration
sed -i "s|listen 8080;|listen ${PORT};|" /etc/nginx/conf.d/default.conf
sed -i 's/^listen = .*$/listen = \/var\/run\/php-fpm.sock/' /usr/local/etc/php-fpm.d/www.conf

mkdir -p /var/run 
chown -R www-data:www-data /var/run

# === CRITICAL NEW LINE: CHECK NGINX SYNTAX ===
# If the syntax is bad, this command will fail and Cloud Run will log the error.
nginx -t 

if [ $? -ne 0 ]; then
  echo "Nginx configuration test failed. Check logs."
  exit 1
fi
# ============================================

# Start PHP-FPM in the background.
php-fpm

# Start Nginx in the foreground.
exec nginx -g "daemon off;"