# Commands

```sh
docker pull php:7.4.0-apache-buster

docker run -v $(pwd):/var/www/html -p 8080:80 php:7.4.0-apache-buster

# Dockerfile
docker build -t localhost-php7-apache .

docker run -p 8080:80 localhost-php7-apache

# docker-compose.yaml file
docker-compose up

# make composer faster
composer global require hirak/prestissimo

# download laravel
composer create-project --prefer-dist laravel/laravel hat

# check running container
docker-compose ps
docker ps

# go into container
docker-compose exec nyhat bash
docker exec -it nyhat_nyhat_1 bash
pwd
id

# rebuild after adding files (--no-cache)
docker-compose up --force-recreate --build

# grant storage access
chmod -R 777 storage/

# update documentroot in Dockerfile & then rebuild
```
