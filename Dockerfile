# Usa una imagen base oficial de PHP 8.2 con Apache
FROM php:8.2-apache

# Establecer el directorio de trabajo
WORKDIR /var/www/html

# Instalar dependencias necesarias (como librerías para Laravel)
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    libzip-dev \
    git \
    unzip \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd zip pdo pdo_mysql

# Habilitar el módulo de rewrite de Apache para Laravel
RUN a2enmod rewrite

# Copiar el archivo composer.phar (si no se tiene Composer previamente instalado)
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Copiar todos los archivos del proyecto al contenedor
COPY . /var/www/html

# Copiar los archivos de configuración de Apache si es necesario (si tienes un archivo .conf)
# COPY ./path/to/apache.conf /etc/apache2/sites-available/000-default.conf

# Configurar permisos para directorios de almacenamiento y caché
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Ejecutar Composer para instalar dependencias de Laravel
RUN composer install --no-dev --optimize-autoloader

# Exponer el puerto 80 para Apache
EXPOSE 80

# Configurar el comando que se ejecutará al iniciar el contenedor
CMD ["apache2-foreground"]
