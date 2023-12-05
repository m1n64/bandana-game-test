FROM php:8.1-cli as base

RUN apt-get update && apt-get install -y \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    curl \
    unzip \
    git \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

WORKDIR /var/www

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

COPY --from=ghcr.io/roadrunner-server/roadrunner:2023.1.1 /usr/bin/rr /usr/local/bin/rr

EXPOSE 8000/tcp

COPY . /var/www

RUN chown -R www-data:www-data /var/www
RUN chmod -R 755 /var/www

RUN composer install
RUN composer require laravel/octane

FROM base as production
CMD ["rr", "serve", "-c", "./docker/roadrunner/.rr.yaml"]

FROM base as development

RUN pecl install xdebug \
    && docker-php-ext-enable xdebug

RUN echo 'xdebug.mode=develop,debug' >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    && echo 'xdebug.client_host=host.docker.internal' >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    && echo 'xdebug.client_port=9003' >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    && echo 'xdebug.start_with_request=yes' >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini

CMD ["rr", "serve", "-c", "./docker/roadrunner/.rr.yaml"]
