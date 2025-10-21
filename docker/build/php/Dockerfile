FROM phpdockerio/php:8.4-fpm

RUN apt-get update \
    && apt-get -y install \
    git \
    php8.4-mbstring \
    php8.4-pgsql \
    php8.4-mysql \
    php8.4-intl \
    php8.4-interbase \
    php8.4-soap \
    php8.4-opcache \
    php8.4-zip \
    php8.4-xdebug \
    php8.4-redis \
    php8.4-bcmath \
    && apt-get clean; rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* /usr/share/doc/*

COPY ./php.ini /etc/php/8.4/fpm/conf.d/php.ini
COPY ./php.ini /etc/php/8.4/cli/conf.d/php.ini
COPY ./xdebug.ini /etc/php/8.4/fpm/conf.d/99-xdebug.ini

RUN usermod -u 1001 www-data
RUN mkdir /var/log/php && touch /var/log/php/error.log && chown www-data:www-data /var/log/php/error.log

COPY --from=composer:2.8 /usr/bin/composer /usr/bin/composer

WORKDIR "/var/www"

EXPOSE 9000
