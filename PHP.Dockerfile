FROM php:fpm

RUN docker-php-ext-install mysqli pdo pdo_mysql 
RUN pecl install xdebug && docker-php-ext-enable xdebug