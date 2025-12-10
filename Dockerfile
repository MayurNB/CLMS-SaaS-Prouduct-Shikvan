# -----------------------------
# Base Image
# -----------------------------
FROM php:8.3-apache

# -----------------------------
# Set Working Directory
# -----------------------------
WORKDIR /var/www/html

# -----------------------------
# Install System Dependencies
# -----------------------------
RUN apt-get update && apt-get install -y \
    libpng-dev libonig-dev libxml2-dev zip unzip procps \
    && docker-php-ext-install pdo pdo_mysql mbstring exif pcntl bcmath gd \
    && rm -rf /var/lib/apt/lists/*

# -----------------------------
# Enable Apache Modules
# -----------------------------
RUN a2enmod rewrite

# -----------------------------
# Replace Apache port with Cloud Run port
# -----------------------------
COPY docker/apache-cloudrun.conf /etc/apache2/ports.conf
COPY docker/apache-cloudrun.conf /etc/apache2/sites-available/000-default.conf


# Add a default ServerName to avoid warning
RUN echo "ServerName 127.0.0.1" > /etc/apache2/conf-available/servername.conf && a2enconf servername

# -----------------------------
# Copy Project Files
# -----------------------------
COPY . .

# -----------------------------
# Install Composer (copy from official composer image)
# -----------------------------
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer
RUN composer install --no-dev --optimize-autoloader --no-interaction --prefer-dist

# -----------------------------
# Clear Laravel Config Cache
# -----------------------------
RUN php artisan config:clear

# -----------------------------
# Create writable folders & set permissions
# -----------------------------
RUN mkdir -p storage/framework/cache storage/framework/sessions storage/framework/views bootstrap/cache \
    && chown -R www-data:www-data storage bootstrap/cache public \
    && chmod -R 775 storage bootstrap/cache public

# -----------------------------
# Entrypoint
# -----------------------------
COPY entrypoint.sh /entrypoint.sh
RUN chmod +x /entrypoint.sh
ENTRYPOINT ["/entrypoint.sh"]

# -----------------------------
# Expose Cloud Run Port (informative)
# -----------------------------
EXPOSE 8080

# -----------------------------
# Start Apache
# -----------------------------
CMD ["apache2-foreground"]
