#!/bin/bash

# Clear all caches
docker-compose exec app php artisan cache:clear
docker-compose exec app php artisan config:clear
docker-compose exec app php artisan route:clear
docker-compose exec app php artisan view:clear

# Optimize the application
docker-compose exec app php artisan optimize
docker-compose exec app php artisan config:cache
docker-compose exec app php artisan route:cache
docker-compose exec app php artisan view:cache

# Restart PHP-FPM
docker-compose restart app

echo "Application optimized for better performance!"
