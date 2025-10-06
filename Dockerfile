FROM php:8.2-fpm

# Instalar dependências do sistema
RUN apt-get update && apt-get install -y \
    git unzip libpq-dev libpng-dev libjpeg-dev libfreetype6-dev \
    && docker-php-ext-install pdo pdo_mysql gd

# Instalar Composer
COPY --from=composer:2.6 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www

COPY . .

RUN composer install

EXPOSE 8000

CMD php artisan serve --host=0.0.0.0 --port=8000
