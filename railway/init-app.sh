#!/bin/bash
# Make sure this file has executable permissions, run `chmod +x railway/init-app.sh`

# 1. Redirect stderr (2) to stdout (1)
# This ensures all error messages are treated as standard output and captured by Railway logs.
exec 2>&1

# 2. (Optional) Print commands to the log as they are executed
# This helps debug exactly where the script crashes.
set -x

# Exit the script if any command fails
set -e

# Run migrations
php artisan migrate --force

# Clear cache
php artisan optimize:clear

# Cache the various components of the Laravel application
php artisan config:cache
php artisan event:cache
php artisan route:cache
php artisan view:cache

# Seed the database
# php artisan migrate:fresh --seed --force
