#!/bin/sh

# Create writable directories
mkdir -p storage/framework/cache storage/framework/sessions storage/framework/views bootstrap/cache
chown -R www-data:www-data storage bootstrap/cache
chmod -R 775 storage bootstrap/cache

# Run migrations and optimize (optional, only first deployment)
# php artisan migrate --force
# php artisan config:cache
# php artisan route:cache
# php artisan view:cache

# Start Apache
exec apache2-foreground
