# Image PHP 8
FROM php:8.1-fpm

# Copy file konfigurasi untuk PHP
RUN echo "memory_limit=-1" > "$PHP_INI_DIR/conf.d/memory-limit.ini" \
    && echo "date.timezone=${PHP_TIMEZONE:-UTC}" > "$PHP_INI_DIR/conf.d/date_timezone.ini" \
    && echo "max_execution_time=300" > "$PHP_INI_DIR/conf.d/execution-limit.ini" 

RUN apt-get update \
    && apt-get install -y libpq-dev \
    && docker-php-ext-install pdo_mysql 

# install composer
ENV COMPOSER_ALLOW_SUPERUSER 1
ENV COMPOSER_HOME /tmp
ENV COMPOSER_VERSION 2.2.0

# Add a custom script to initialize the database
COPY ./init-db.sql /docker-entrypoint-initdb.d/

# Expose the MySQL port
# EXPOSE 3306

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

WORKDIR /app