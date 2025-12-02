# 1. BASE IMAGE: Use PHP 8.2 to match your Laravel/Composer requirements (PHP ^8.2).
FROM php:8.2-fpm-alpine

# Set the working directory inside the container
WORKDIR /var/www/html

# 2. DEPENDENCY INSTALLATION, COMPILATION, AND CLEANUP
# This step is critical: it installs both development headers (for compiling extensions) 
# and the necessary runtime libraries (for extensions to work).
RUN apk update \
    && apk add --no-cache --update \
        # Dependencies needed for compiling extensions
        linux-headers \
        libpng-dev \
        libjpeg-turbo-dev \
        freetype-dev \
        libzip-dev \
        oniguruma-dev \
        ${PHPIZE_DEPS} \
        # General tools needed for the build process
        git \
        curl \
        unzip \
    \
    # Compile and install PHP extensions
    && docker-php-ext-install pdo pdo_mysql mbstring exif pcntl bcmath sockets \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd \
    \
    # Install runtime packages that were originally only available as -dev.
    # We must keep the runtime versions (e.g., libpng, libjpeg-turbo) to prevent the 
    # 'No such file or directory' errors at runtime.
    && apk add --no-cache \
        libpng \
        libjpeg-turbo \
        freetype \
        libzip \
    \
    # Cleanup: Remove only the heavy development headers and cache files
    && apk del --purge *dev \
    && rm -rf /var/cache/apk/* /tmp/* /usr/share/doc/*

# 3. COMPOSER AND APPLICATION SETUP

# Copy Composer binary from the official Composer image
COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer

# Copy application code into the container
COPY . .

# Fix for "detected dubious ownership" git error during composer install/update
# This is necessary because the files were copied by root but will be used by the www-data user later.
RUN git config --global --add safe.directory /var/www/html

# Run Composer installation for production
# This should now succeed because the PHP version (8.2) matches the composer.lock file.
RUN composer install --no-dev --optimize-autoloader

# Set the correct permissions for Laravel storage (CRITICAL)
RUN chown -R www-data:www-data /var/www/html/storage \
    && chown -R www-data:www-data /var/www/html/bootstrap/cache

# 4. EXPOSE AND START

# Expose the FPM port (Cloud Run defaults to $PORT, but this is the PHP-FPM default)
EXPOSE 9000

# Start the PHP-FPM server
CMD ["php-fpm"]