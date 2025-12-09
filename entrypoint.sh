#!/bin/sh
set -e

# Clear Laravel caches (prevents 500 errors on fresh deploys)
php artisan config:clear
php artisan cache:clear
php artisan route:clear
php artisan view:clear

# Start Apache (listen on $PORT)
exec apache2-foreground
