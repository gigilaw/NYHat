# Commands

```sh
docker pull php:7.4.0-apache-buster

docker run -v $(pwd):/var/www/html -p 8080:80 php:7.4.0-apache-buster

# Dockerfile
docker build -t localhost-php7-apache .

docker run -p 8080:80 localhost-php7-apache

# docker-compose.yaml file
docker-compose up
```
