# Using the PHP 8.2 as Apache base image
FROM php:8.2-apache

# mise à jour des paquits linux avant installation des serveur db et apache
RUN apt-get update && apt-get install -y libpng-dev libjpeg-dev libfreetype6-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd openssl
# installation des extentions php et msqli
RUN docker-php-ext-install mysqli pdo_mysql pdo && docker-php-ext-enable pdo_mysqli pdo_mysql pdo


# Install required extensions


COPY . /var/www/html/

#exposer le port 8à pour les connfiguration
EXPOSE 80