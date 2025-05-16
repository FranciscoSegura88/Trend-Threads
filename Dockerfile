FROM php:8.2-fpm

# Instalar dependencias del sistema (sin Node.js si no lo necesitas)
RUN apt-get update && apt-get install -y \
    git unzip curl libzip-dev zip && \  # Removí nodejs npm
    docker-php-ext-install zip pdo pdo_mysql

# Instalar Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www
COPY . .

# Solo instalar dependencias PHP (sin npm)
RUN composer install --no-dev --optimize-autoloader

# Permisos
RUN chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache
RUN chmod -R 775 /var/www/storage /var/www/bootstrap/cache

EXPOSE 8000
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]
