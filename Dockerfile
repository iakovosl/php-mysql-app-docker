FROM php:7.4-apache
# Install XDebug
RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli
RUN pecl install -o -f xdebug-3.1.5 \
&& docker-php-ext-enable xdebug
# Update apt cache
RUN apt-get update

# Copy php.ini
COPY ./php.ini /usr/local/etc/php

COPY src/ /var/www/html/