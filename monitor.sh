#!/bin/bash

echo "Monitoring system resources..."
echo "Press Ctrl+C to exit"
echo ""

while true; do
    echo "=== $(date) ==="
    echo "Docker Container Stats:"
    docker stats --no-stream
    
    echo ""
    echo "PHP-FPM Process Status:"
    docker-compose exec app ps aux | grep php-fpm
    
    echo ""
    echo "MySQL Process Status:"
    docker-compose exec db mysqladmin status
    
    echo ""
    echo "Redis Status:"
    docker-compose exec redis redis-cli info | grep used_memory
    
    echo ""
    echo "Sleeping for 5 seconds..."
    sleep 5
    clear
done
