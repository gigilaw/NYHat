FROM php:7.4.0-apache-buster
COPY . /var/www/html
# expose port 8080:80