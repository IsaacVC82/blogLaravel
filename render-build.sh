#!/usr/bin/env bash

if ! command -v composer &> /dev/null; then
    echo "Instalando Composer..."
    curl -sSL https://getcomposer.org/installer | php
    sudo mv composer.phar /usr/local/bin/composer
fi

# Instalar dependencias de Laravel
echo "Instalando dependencias de Composer..."
composer install --no-dev --optimize-autoloader

# Generar APP_KEY (si no existe)
if [ -z "$(grep '^APP_KEY=' .env)" ]; then
    echo "Generando APP_KEY..."
    php artisan key:generate
else
    echo "APP_KEY ya existe, omitiendo generación."
fi

# Cachear configuración y rutas
echo "Cacheando configuración y rutas..."
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Migrar la base de datos (si es necesario)
echo "Ejecutando migraciones..."
php artisan migrate --force

# Establecer permisos correctos
echo "Estableciendo permisos..."
chmod -R 775 storage bootstrap/cache
chown -R www-data:www-data storage bootstrap/cache

echo "¡Construcción completada!"
