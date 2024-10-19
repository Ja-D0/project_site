FROM php:8.3-fpm

WORKDIR /var/www/project_site

RUN apt-get update && apt-get install -y

RUN docker-php-ext-install pdo_mysql opcache

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
