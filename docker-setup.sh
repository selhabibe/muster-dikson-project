#!/bin/bash

# Create necessary directories
mkdir -p docker/nginx/conf.d
mkdir -p docker/php
mkdir -p docker/mysql

# Copy .env file if it doesn't exist
if [ ! -f .env ]; then
    cp .env.docker .env
    echo "Created .env file from .env.docker"
fi

# Build and start Docker containers
docker-compose up -d

# Wait for containers to be ready
echo "Waiting for containers to be ready..."
sleep 10

# Install dependencies
docker-compose exec app composer install

# Generate application key
docker-compose exec app php artisan key:generate

# Run migrations
docker-compose exec app php artisan migrate

# Optimize the application
docker-compose exec app php artisan optimize
docker-compose exec app php artisan config:cache
docker-compose exec app php artisan route:cache
docker-compose exec app php artisan view:cache

# Set proper permissions
docker-compose exec app chmod -R 775 storage bootstrap/cache

echo "Setup complete! Your application is running at http://localhost"
