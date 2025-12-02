# 1. BASE IMAGE: Use PHP 8.2 to match your Laravel/Composer requirements (PHP ^8.2).
FROM php:8.2-fpm-alpine

# Set the working directory inside the container
WORKDIR /var/www/html

# 2. DEPENDENCY INSTALLATION, COMPILATION, AND CLEANUP
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
        # CRITICAL ADDITION: Install Nginx, the web server
        nginx \
    \
    # Compile and install PHP extensions
    && docker-php-ext-install pdo pdo_mysql mbstring exif pcntl bcmath sockets \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd \
    \
    # Install runtime packages that were originally only available as -dev.
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
RUN git config --global --add safe.directory /var/www/html

# Run Composer installation for production
RUN composer install --no-dev --optimize-autoloader

# Set the correct permissions for Laravel storage (CRITICAL)
RUN chown -R www-data:www-data /var/www/html/storage \
    && chown -R www-data:www-data /var/www/html/bootstrap/cache

# 4. EXPOSE AND START

# CRITICAL FIX: Link your custom nginx.conf to the guaranteed config file location
RUN rm -f /etc/nginx/http.d/default.conf
COPY nginx.conf /etc/nginx/http.d/default.conf 

# Copy the startup script and make it executable
COPY start.sh /usr/local/bin/start.sh
RUN chmod +x /usr/local/bin/start.sh

# The container will listen on the port defined by Cloud Run ($PORT, usually 8080)
EXPOSE 8080

# === REMOVED THE 'USER www-data' LINE HERE ===

# Use the startup script as the entrypoint
CMD ["/usr/local/bin/start.sh"]