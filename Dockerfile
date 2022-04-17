FROM php:8.1

RUN apt-get update && apt-get install -y libcurl4-openssl-dev pkg-config libssl-dev

RUN pecl install xdebug
RUN docker-php-ext-enable xdebug

RUN echo "xdebug.mode=debug,coverage" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini
RUN echo "xdebug.client_host=127.0.0.1" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini
RUN echo "xdebug.client_port=9000" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini
