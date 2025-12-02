# Use a lean FPM image for performance
FROM php:8.1-fpm-alpine

# Set the working directory inside the container
WORKDIR /var/www/html

# 1. Install System Dependencies (Fixes sockets, gd, AND mbstring)
# We use 'oniguruma-dev' here to satisfy the 'mbstring' extension dependency.
RUN apk update \
    && apk add --no-cache --update \
        linux-headers \
        libpng-dev \
        libjpeg-turbo-dev \
        freetype-dev \
        libzip-dev \
        git \
        curl \
        unzip \
        oniguruma-dev \
        ${PHPIZE_DEPS} \
    # 2. Install PHP Extensions
    # This step should now complete successfully
    && docker-php-ext-install pdo pdo_mysql mbstring exif pcntl bcmath sockets \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd \
    # 3. Clean up
    && apk del --purge *dev \
    && rm -rf /var/cache/apk/* /tmp/* /usr/share/doc/*

# Copy Composer binary from the official Composer image
COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer

# Copy application code into the container
COPY . .

# Run Composer installation for production
RUN composer install --no-dev --optimize-autoloader

# Set the correct permissions for Laravel storage (CRITICAL)
RUN chown -R www-data:www-data /var/www/html/storage \
    && chown -R www-data:www-data /var/www/html/bootstrap/cache

# Expose the FPM port (Cloud Run defaults to $PORT, but this is the PHP-FPM default)
EXPOSE 9000

# Start the PHP-FPM server (required for a web service)
CMD ["php-fpm"]