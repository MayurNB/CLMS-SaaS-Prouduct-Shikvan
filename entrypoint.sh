#!/bin/bash
set -e

# 1. FIX APACHE CONFLICTS (Crucial for Railway)
# Disable event/worker and force prefork so PHP can run
a2dismod mpm_event mpm_worker || true
a2enmod mpm_prefork || true

# 2. YOUR CLOUD SQL LOGIC
if [ -n "$DB_SOCKET" ]; then
  echo "Using Cloud SQL socket at $DB_SOCKET"
fi

# 3. DATABASE MIGRATIONS
# Migrations run here so the DB is ready before users arrive
php artisan migrate --force --no-interaction --no-ansi --seed \
  || echo "Migration failed or skipped, but starting server anyway..."

# 4. PERFORMANCE OPTIMIZATION
# These make your LMS load faster for students
php artisan config:cache
php artisan route:cache
php artisan view:cache

# 5. START APACHE
# This replaces the script process with the actual web server
exec apache2-foreground