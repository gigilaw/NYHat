FROM php:7.4.0-apache-buster
COPY . /var/www/html

RUN apt-get update && apt-get install -y git ssh zip unzip libzip-dev \
  --no-install-recommends && rm -r /var/lib/apt/lists/*

ENV APACHE_DOCUMENT_ROOT /var/www/html/public

RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

RUN docker-php-ext-install bcmath zip

RUN a2enmod rewrite