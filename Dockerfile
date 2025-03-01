# Usar una imagen base de PHP 8.2 con FPM
FROM php:8.2-fpm

# Establecer el directorio de trabajo
WORKDIR /var/www

# Instalar dependencias necesarias para Laravel y PHP
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    zip \
    git \
    bash \
    libicu-dev \
    libzip-dev \
    libxml2-dev \
    curl \
    sudo \
    nginx \
    && rm -rf /var/lib/apt/lists/*

# Instalar las extensiones de PHP necesarias para Laravel
RUN docker-php-ext-install intl zip pdo pdo_mysql opcache

# Instalar Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Copiar los archivos del proyecto al contenedor
COPY . .

# Establecer los permisos adecuados para el proyecto
RUN chown -R www-data:www-data /var/www

# Instalar las dependencias de Laravel
RUN composer install --no-dev --optimize-autoloader

# Configurar permisos adicionales si es necesario (por ejemplo, para la carpeta storage)
RUN chmod -R 775 /var/www/storage /var/www/bootstrap/cache

# Configurar Nginx
COPY ./nginx/default.conf /etc/nginx/sites-available/default
RUN rm -f /etc/nginx/sites-enabled/default && \
    ln -s /etc/nginx/sites-available/default /etc/nginx/sites-enabled/

# Exponer el puerto 80 para servir la aplicación
EXPOSE 80

# Iniciar tanto PHP-FPM como Nginx
CMD service nginx start && php-fpm