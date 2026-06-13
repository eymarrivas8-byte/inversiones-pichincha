FROM php:8.3-fpm

WORKDIR /var/www

# Instalar dependencias del sistema
RUN apt-get update && apt-get install -y \
    git curl unzip zip libzip-dev libonig-dev libxml2-dev

# Extensiones PHP completas para Laravel
RUN docker-php-ext-install pdo pdo_mysql mbstring zip xml ctype

# Instalar Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Copiar proyecto
COPY . .

# Instalar dependencias (modo seguro)
RUN composer install --no-interaction --no-progress

# Permisos Laravel
RUN chmod -R 775 storage bootstrap/cache

# Puerto Render
EXPOSE 10000

# Iniciar servidor
CMD php artisan serve --host=0.0.0.0 --port=10000