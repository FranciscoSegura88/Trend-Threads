# Usa la imagen oficial de PHP con Apache
FROM php:8.2-apache

# Instala dependencias del sistema (sin Node.js ni MySQL)
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    curl \
    libzip-dev \
    zip \
    && docker-php-ext-install zip \
    && a2enmod rewrite

# Instala Composer globalmente
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Configura el directorio de trabajo
WORKDIR /var/www/html

# Copia los archivos del proyecto (EXCLUYENDO node_modules y archivos innecesarios)
COPY . .

# Instala solo dependencias PHP (sin dev)
RUN composer install --no-dev --optimize-autoloader --no-interaction

# Configura permisos para Laravel
RUN chown -R www-data:www-data /var/www/html/storage \
    && chmod -R 775 /var/www/html/storage

# Configura el virtual host de Apache
COPY docker/000-default.conf /etc/apache2/sites-available/000-default.conf

# Habilita el sitio y reinicia Apache
RUN a2ensite 000-default.conf \
    && service apache2 restart

# Puerto expuesto (Apache usa el 80 por defecto)
EXPOSE 80

# Comando de inicio
CMD ["apache2-foreground"]
