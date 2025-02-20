# Usa una imagen base oficial de PHP con Apache
FROM php:8.1-apache

# Instala dependencias necesarias para Laravel y Composer
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libzip-dev \
    unzip \
    git \
    libxml2-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd pdo pdo_mysql zip

# Instala Composer (gestor de dependencias de PHP)
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Verifica que Composer se haya instalado correctamente
RUN composer --version

# Copia el archivo .env y el resto de la aplicación
COPY . /var/www/html

# Configura el directorio de trabajo
WORKDIR /var/www/html

# Establece el propietario adecuado para los archivos y carpetas de Laravel
RUN chown -R www-data:www-data /var/www/html
RUN chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

# Instala las dependencias de Composer
RUN composer install 

# Exponer el puerto 80 para que el contenedor sea accesible en ese puerto
EXPOSE 80

# Inicia el servidor Apache para servir la aplicación
CMD ["apache2-foreground"]
