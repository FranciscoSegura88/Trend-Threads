FROM php:8.2-fpm

# 1. Instalar dependencias del sistema (añade npm)
RUN apt-get update && apt-get install -y \
    git unzip curl libzip-dev zip nodejs npm && \
    docker-php-ext-install zip pdo pdo_mysql && \
    npm install -g vite

# 2. Instalar Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# 3. Establecer directorio de trabajo
WORKDIR /var/www

# 4. Copiar todos los archivos del proyecto (incluyendo assets compilados)
COPY . .

# 5. Instalar dependencias PHP (sin --no-dev para desarrollo)
RUN composer install --optimize-autoloader

# 6. Configurar permisos
RUN chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache /var/www/public/build
RUN chmod -R 775 /var/www/storage /var/www/bootstrap/cache /var/www/public/build

# 7. Exponer puerto
EXPOSE 8000

# 8. Comando de inicio (mejorado)
CMD bash -c "php artisan serve --host=0.0.0.0 --port=8000"
