# Stage 1: Build the PHP application and install dependencies
FROM php:8.3-fpm-alpine AS laravel_build

# Install system dependencies, including the MySQL client library
RUN apk update && apk add --no-cache \
    mysql-client \
    git \
    unzip \
    libzip-dev \
    libpng-dev \
    jpeg-dev \
    freetype-dev \
    oniguruma-dev \
    g++

# Install PHP extensions required by Laravel
RUN docker-php-ext-install pdo pdo_mysql mbstring exif pcntl bcmath gd sockets \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory inside the container
WORKDIR /app

# Copy the entire Laravel application into the container
COPY . /app

# Install PHP dependencies (production optimized)
RUN composer install --no-dev --optimize-autoloader

# Run configuration commands
RUN php artisan key:generate --force
RUN php artisan config:cache
RUN php artisan route:cache

# --- Stage 2: Final Nginx Production Image ---
FROM nginx:stable-alpine

# Copy the Nginx configuration file
COPY docker/nginx/conf.d/default.conf /etc/nginx/conf.d/default.conf

# Copy the application code from the PHP-FPM stage
COPY --from=laravel_build /app /app

# Ensure storage directory is writable by Nginx/PHP
RUN chown -R www-data:www-data /app/storage /app/bootstrap/cache
RUN chmod -R 775 /app/storage /app/bootstrap/cache

# Expose port 8080 (Cloud Run listens on 8080)
EXPOSE 8080

# Start Nginx
CMD ["nginx", "-g", "daemon off;"]
