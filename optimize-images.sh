#!/bin/bash

echo "Optimizing images for better performance..."

# Install image optimization tools if not already installed
docker-compose exec app apt-get update
docker-compose exec app apt-get install -y jpegoptim optipng pngquant gifsicle

# Optimize JPEG images
echo "Optimizing JPEG images..."
docker-compose exec app find /var/www/public -type f -name "*.jpg" -exec jpegoptim --strip-all --max=85 {} \;
docker-compose exec app find /var/www/public -type f -name "*.jpeg" -exec jpegoptim --strip-all --max=85 {} \;

# Optimize PNG images
echo "Optimizing PNG images..."
docker-compose exec app find /var/www/public -type f -name "*.png" -exec optipng -o5 {} \;
docker-compose exec app find /var/www/public -type f -name "*.png" -exec pngquant --force --quality=65-80 --skip-if-larger --strip {} --output {} \;

# Optimize GIF images
echo "Optimizing GIF images..."
docker-compose exec app find /var/www/public -type f -name "*.gif" -exec gifsicle -b -O3 {} \;

echo "Image optimization complete!"
