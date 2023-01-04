FROM php:8.0-apache-bullseye
COPY ./php/php.ini /usr/local/etc/php/

RUN apt-get update \
  # && apt-get install -y default-mysql-client \
  && install nodejs npm
  && docker-php-ext-install pdo_mysql mysqli \
  && docker-php-ext-enable mysqli \
  && a2enmod rewrite

COPY ./apache/apache2.conf /etc/apache2/sites-enabled/
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
ENV COMPOSER_ALLOW_SUPERUSER 1
ENV COMPOSER_HOME /composer
ENV PATH $PATH:/composer/vendor/bin

WORKDIR /var/www/html