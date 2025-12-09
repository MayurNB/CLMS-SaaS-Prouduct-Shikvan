#!/bin/sh
set -e

# Ensure the PORT env exists for Apache config templates if needed.
export PORT="${PORT:-8080}"

# Start Apache in foreground (Cloud Run expects process to listen on $PORT)
exec apache2-foreground
