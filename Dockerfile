FROM php:8.3-apache

# Instalar as extensões do PHP
RUN docker-php-ext-install pdo pdo_mysql

# Copiar os arquivos do projeto para o contêiner
COPY src/ /var/www/html/

WORKDIR /var/www/html