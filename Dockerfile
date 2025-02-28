# Usamos una imagen base con PHP 8.2
FROM php:8.2-fpm

# Instalar dependencias necesarias para Laravel
RUN apt-get update && apt-get install -y libpng-dev libjpeg-dev libfreetype6-dev zip git bash libicu-dev libzip-dev

# Instalar las extensiones necesarias de PHP
RUN docker-php-ext-configure zip
RUN docker-php-ext-install intl zip

# Instalar Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Establecer el directorio de trabajo
WORKDIR /var/www

# Copiar los archivos del proyecto al contenedor
COPY . .

# Instalar las dependencias de Laravel
RUN composer install --no-dev --optimize-autoloader

# Configurar los permisos
RUN chown -R www-data:www-data /var/www

# Exponer el puerto 80
EXPOSE 80

# Comando para iniciar el servidor
CMD ["php-fpm"]
