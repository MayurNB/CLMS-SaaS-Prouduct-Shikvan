#!/bin/sh

PORT=${PORT:-8080}

echo "Starting Nginx on port ${PORT} and PHP-FPM (via socket)..."

# Dynamically update the Nginx configuration to listen on the required $PORT
sed -i "s|listen 8080;|listen ${PORT};|" /etc/nginx/conf.d/default.conf

# Update PHP-FPM to listen on the Unix socket.
sed -i 's/^listen = .*$/listen = \/var\/run\/php-fpm.sock/' /usr/local/etc/php-fpm.d/www.conf

# Ensure the directory for the socket is owned by www-data
mkdir -p /var/run 
chown -R www-data:www-data /var/run

# CRITICAL FIX: Check NGINX syntax before starting
nginx -t 

if [ $? -ne 0 ]; then
  echo "Nginx configuration test failed. Check logs."
  exit 1
fi

# Start PHP-FPM in the background. 
php-fpm

# Start Nginx in the foreground. This keeps the container alive.
exec nginx -g "daemon off;"