#!/bin/sh
set -e

# Start Apache (Cloud Run requires the container to listen on $PORT)
exec apache2-foreground

