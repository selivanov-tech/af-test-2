FROM php:8.3-cli

ENV COMPOSER_ALLOW_SUPERUSER=1 \
    XDEBUG_MODE=develop,debug \
    XDEBUG_CONFIG="serverName=af.test;client_host=host.docker.internal"

RUN apt-get update && apt-get install -y \
    git \
    unzip \
    sqlite3 \
    libsqlite3-dev \
    libzip-dev \
    curl \
    && docker-php-ext-install pdo pdo_sqlite zip

RUN curl -sS https://get.symfony.com/cli/installer | bash && mv /root/.symfony*/bin/symfony /usr/local/bin/symfony

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

RUN pecl install xdebug && docker-php-ext-enable xdebug

WORKDIR /app

COPY . /app

RUN composer install

EXPOSE 9003

CMD ["php", "-S", "0.0.0.0:8000", "-t", "public"]
