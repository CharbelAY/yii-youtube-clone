FROM php:7.4-apache
RUN mkdir /var/www/freecodetube.testingapp && mkdir /var/www/freecodetube.testingapp/public_html
RUN docker-php-ext-install pdo pdo_mysql
RUN apt-get update -y && apt-get install -y openssl zip unzip git vim links
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer