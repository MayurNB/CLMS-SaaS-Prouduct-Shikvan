#!/bin/sh
set -e

# Replace Apache port with Cloud Run PORT
sed -i "s/Listen .*/Listen ${PORT:-8080}/" /etc/apache2/ports.conf

# Clear Laravel caches (optional)
php artisan config:clear
php artisan cache:clear
php artisan route:clear
php artisan view:clear

# Start Apache
exec apache2-foreground
