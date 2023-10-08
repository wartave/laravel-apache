#imagen apache
FROM php:8.1-apache

# variables de entorno
ENV APACHE_LOG_DIR /var/log/apache2

# extenciones
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    zip \
    unzip \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd pdo pdo_mysql



# Configurar el servidor web Apache y habilita el módulo rewrite
RUN a2enmod rewrite


COPY ./ /var/www/html/

# Edireccion de trabajo
WORKDIR /var/www/html

# Instala Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Instala las dependencias de Composer
RUN composer install

# Cambia los permisos de almacenamiento (ajusta según sea necesario)
RUN chown -R www-data:www-data /var/www/html/storage

# Exponer el puerto 80 del servidor web
EXPOSE 80

# Comando de inicio para el servidor Apache
CMD ["apache2-foreground"]
# virtual host apache
 COPY laravel.conf /etc/apache2/sites-available/laravel.conf

# habilitar el VirtualHost
RUN a2ensite laravel.conf
