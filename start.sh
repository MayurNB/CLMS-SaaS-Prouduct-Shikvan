#!/bin/bash

# Cloud Run sets the $PORT environment variable. Use 8080 as a fallback for local testing.
PORT=${PORT:-8080}

# 1. Start PHP-FPM in the background
echo "Starting PHP-FPM..."
/usr/sbin/php-fpm7.4 -D

# 2. Run Database Migrations (Critical for Laravel)
# We wait a moment for the Cloud SQL proxy (via DB_SOCKET) to establish connection
sleep 5
echo "Running database migrations..."
php artisan migrate --force

# 3. Cache configuration and routes (Optimization)
echo "Caching configurations and routes..."
php artisan config:cache
php artisan route:cache

# 4. Start Nginx
echo "Starting Nginx on port ${PORT}..."
# We run Nginx in the foreground so the container stays alive.
# Nginx must be configured to listen on the dynamic $PORT.
# If your nginx.conf uses a hardcoded port (e.g., `listen 80;`), this will fail. 
# It should dynamically listen to the $PORT environment variable.

/usr/sbin/nginx -g "daemon off;"