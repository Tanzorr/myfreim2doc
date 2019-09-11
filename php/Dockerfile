FROM php:7.0-apache

RUN apt-get update && apt-get install -y

RUN docker-php-ext-install mysqli pdo_mysql
RUN a2enmod rewrite

RUN pecl install xdebug



EXPOSE 80
