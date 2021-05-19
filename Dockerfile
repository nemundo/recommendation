FROM php:8.0.6-apache

RUN apt update&&apt upgrade -y
RUN docker-php-ext-install pdo pdo_mysql && docker-php-ext-enable pdo_mysql
RUN a2enmod rewrite

COPY ./www/ /var/www/
