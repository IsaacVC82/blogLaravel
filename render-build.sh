#!/usr/bin/env bash

# Instalamos PHP
curl -sSL https://getcomposer.org/installer | php
sudo mv composer.phar /usr/local/bin/composer

# Instalamos dependencias de Laravel
composer install --no-dev --optimize-autoloader

# Generamos APP_KEY
php artisan key:generate

# Cachear configuración y rutas
php artisan config:cache
php artisan route:cache

# Migrar la base de datos (si es necesario)
php artisan migrate --force
