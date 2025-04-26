# Running Muster & Dikson with Docker

This guide will help you set up and run the Muster & Dikson project using Docker for better performance and consistency.

## Prerequisites

- Docker
- Docker Compose

## Setup Instructions

1. Clone the repository (if you haven't already):
   ```
   git clone https://github.com/selhabibe/muster-dikson-project.git
   cd muster-dikson-project
   ```

2. Run the setup script:
   ```
   ./docker-setup.sh
   ```
   This script will:
   - Create necessary directories
   - Set up the environment file
   - Build and start Docker containers
   - Install dependencies
   - Generate application key
   - Run migrations
   - Optimize the application for performance

3. Access the application:
   Open your browser and navigate to [http://localhost](http://localhost)

## Performance Optimizations

The Docker setup includes several performance optimizations:

1. **PHP Configuration**:
   - Increased memory limits
   - Optimized OPcache settings
   - Adjusted execution time limits

2. **Nginx Configuration**:
   - Gzip compression for faster content delivery
   - Browser caching for static assets
   - Optimized FastCGI settings

3. **MySQL Configuration**:
   - Optimized InnoDB settings
   - Adjusted buffer pool size
   - Improved transaction commit behavior

4. **Redis Integration**:
   - Session storage in Redis
   - Cache storage in Redis
   - Queue processing with Redis

## Useful Commands

### Start Docker containers:
```
docker-compose up -d
```

### Stop Docker containers:
```
docker-compose down
```

### View logs:
```
docker-compose logs -f
```

### Access the PHP container:
```
docker-compose exec app bash
```

### Run Artisan commands:
```
docker-compose exec app php artisan <command>
```

### Optimize the application:
```
./optimize.sh
```

## Troubleshooting

### Slow page loading:
1. Run the optimization script:
   ```
   ./optimize.sh
   ```

2. Check if Redis is running:
   ```
   docker-compose ps redis
   ```

3. Verify that caching is enabled:
   ```
   docker-compose exec app php artisan config:get cache.default
   ```

### Database connection issues:
1. Check if the MySQL container is running:
   ```
   docker-compose ps db
   ```

2. Verify database credentials in `.env` file

### Permission issues:
1. Fix storage permissions:
   ```
   docker-compose exec app chmod -R 775 storage bootstrap/cache
   ```

## Additional Performance Tips

1. **Production Mode**:
   - Set `APP_ENV=production` and `APP_DEBUG=false` in `.env` for production environments

2. **Asset Optimization**:
   - Compress and optimize images
   - Minify CSS and JavaScript files

3. **Database Optimization**:
   - Run `docker-compose exec app php artisan migrate:fresh --seed` to rebuild the database
   - Consider adding indexes to frequently queried columns
