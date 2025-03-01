# Imagen base con PHP 8.2 y extensiones necesarias
FROM php:8.2-fpm

# Establecer el directorio de trabajo
WORKDIR /var/www

# Instalar dependencias
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    zip \
    unzip \
    git \
    curl \
    libicu-dev \
    libzip-dev \
    libxml2-dev \
    nginx \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd intl zip pdo pdo_mysql opcache

# Instalar Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Copiar archivos del proyecto
COPY . .

# Configurar permisos para Laravel
RUN chown -R www-data:www-data /var/www \
    && chmod -R 775 /var/www/storage /var/www/bootstrap/cache

# Instalar dependencias de Laravel
RUN composer install --no-dev --optimize-autoloader

# Configurar Nginx
COPY ./nginx/default.conf /etc/nginx/conf.d/default.conf

# Configurar variables de entorno
ENV APP_ENV=production
ENV APP_KEY=${APP_KEY}
ENV APP_URL=${RENDER_EXTERNAL_URL}

# Exponer puertos
EXPOSE 80

# Iniciar Nginx y PHP-FPM
CMD ["sh", "-c", "php artisan config:cache && php artisan route:cache && service nginx start && php-fpm"]
