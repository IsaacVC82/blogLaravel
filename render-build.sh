#!/usr/bin/env bash

# Instalar Composer
curl -sS https://getcomposer.org/installer | php
mv composer.phar /usr/local/bin/composer

# Instalar dependencias de Laravel
composer install --no-dev --optimize-autoloader

# Generar clave de la app
php artisan key:generate

# Ejecutar migraciones (si es necesario)
php artisan migrate --force
