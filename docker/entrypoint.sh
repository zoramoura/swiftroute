#!/bin/sh
set -e

# Automatically install dependencies if vendor directory is missing
if [ ! -d "vendor" ]; then
    echo "vendor directory not found. Running composer install..."
    composer install --no-interaction --prefer-dist --optimize-autoloader
fi

# Execute the main container command (e.g., php artisan serve)
exec "$@"