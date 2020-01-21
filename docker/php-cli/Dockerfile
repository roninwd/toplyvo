FROM php:7.4-fpm
#USER root
RUN useradd -ms /bin/bash  roma
WORKDIR /var/www

RUN apt-get update && apt-get install -y wget git unzip libpq-dev libzip-dev zip
RUN docker-php-ext-configure pgsql -with-pgsql=/usr/local/pgsql
RUN docker-php-ext-install pcntl pdo_pgsql zip

RUN apt-get install -y build-essential libssl-dev zlib1g-dev libpng-dev libjpeg-dev libfreetype6-dev
RUN docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd

RUN pecl install xdebug-2.9.0
RUN docker-php-ext-enable xdebug

RUN apt-get update && apt-get install -y sqlite3 libsqlite3-dev

RUN wget https://getcomposer.org/installer -O - -q \
    | php -- --install-dir=/bin --filename=composer --quiet

USER roma

