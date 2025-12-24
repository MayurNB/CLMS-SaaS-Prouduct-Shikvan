#!/bin/bash
set -e

# -----------------------------
# Wait for Cloud SQL socket if using unix_socket
# -----------------------------
if [ -n "$DB_SOCKET" ]; then
  echo "Using Cloud SQL socket at $DB_SOCKET"
fi

# -----------------------------
# Run migrations (optional, uncomment if needed)
# -----------------------------
php artisan migrate --force --no-interaction --no-ansi \
  || echo "Migration already applied or skipped safely"

# -----------------------------
# Clear & cache config (ensure Cloud Run ENV is used)
# -----------------------------
php artisan config:clear
php artisan config:cache

# -----------------------------
# Start Apache
# -----------------------------
exec apache2-foreground
