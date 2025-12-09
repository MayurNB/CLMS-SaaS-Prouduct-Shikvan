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
    libpng-dev libonig-dev libxml2-dev zip unzip \
    && docker-php-ext-install pdo pdo_mysql mbstring exif pcntl bcmath gd

# -----------------------------
# Enable Apache Modules
# -----------------------------
RUN a2enmod rewrite

# -----------------------------
# Replace Apache port with Cloud Run port
# -----------------------------
COPY docker/apache-cloudrun.conf /etc/apache2/ports.conf

# -----------------------------
# Copy Project Files
# -----------------------------
COPY . .

# -----------------------------
# Install Composer
# -----------------------------
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer
RUN composer install --no-dev --optimize-autoloader

# -----------------------------
# Set Permissions
# -----------------------------
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache /var/www/html/public

# -----------------------------
# Copy Entrypoint Script
# -----------------------------
COPY entrypoint.sh /entrypoint.sh
RUN chmod +x /entrypoint.sh
ENTRYPOINT ["/entrypoint.sh"]

# -----------------------------
# Expose Cloud Run Port
# -----------------------------
EXPOSE 8080

# -----------------------------
# Start Apache
# -----------------------------
CMD ["apache2-foreground"]

