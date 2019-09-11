FROM php:7.0-apache

RUN apt-get update ##&& apt-get install -y

RUN docker-php-ext-install mysqli
RUN docker-php-ext-install pdo_mysql

RUN a2enmod \
    rewrite

RUN pecl install xdebug
RUN docker-php-ext-enable xdebug \
    && echo "xdebug.remote_enable=on" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    && echo "xdebug.remote_autostart=off" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini

EXPOSE 80
