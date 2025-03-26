# Usar uma imagem oficial do PHP
FROM php:8.1-fpm

# Instalar dependências do sistema
RUN apt-get update && apt-get install -y libpng-dev libjpeg-dev libfreetype6-dev zip git libzip-dev

# Instalar extensões do PHP
RUN docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd pdo pdo_mysql zip

# Definir diretório de trabalho
WORKDIR /var/www

# Copiar o composer para dentro da imagem
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Instalar dependências do Composer
RUN composer install

# Expor a porta 9000 para o PHP-FPM
EXPOSE 9000
