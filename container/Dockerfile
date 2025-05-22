# Usa a imagem oficial do Ubuntu 22.04
FROM ubuntu:22.04

# Define o mantenedor
LABEL maintainer="Raquel Martins <raquelmartins032@gmail.com>"

# Define o ambiente como não interativo para evitar prompts
ENV DEBIAN_FRONTEND=noninteractive

# Atualiza os pacotes e instala dependências do sistema
RUN apt-get update && apt-get install -y \
    software-properties-common \
    curl \
    unzip \
    git \
    nano \
    zip \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libonig-dev \
    libzip-dev \
    libpq-dev \
    libssl-dev \
    libxml2-dev \
    default-mysql-client \
    tzdata

# Define o fuso horário automaticamente
RUN ln -fs /usr/share/zoneinfo/America/Sao_Paulo /etc/localtime && dpkg-reconfigure -f noninteractive tzdata

# Adiciona repositório do PHP 8.2
RUN add-apt-repository ppa:ondrej/php -y && apt-get update

# Instala o PHP 8.2 com FPM e extensões necessárias sem interação
RUN apt-get install -y php8.2 php8.2-fpm php8.2-cli \
    php8.2-curl php8.2-mbstring php8.2-xml php8.2-zip php8.2-bcmath php8.2-soap \
    php8.2-gd php8.2-intl php8.2-readline php8.2-tokenizer php8.2-mysql php8.2-pgsql \
    php8.2-redis php8.2-mongodb php8.2-xdebug

# Cria o diretório para o socket do PHP-FPM
RUN mkdir -p /run/php && chown -R www-data:www-data /run/php

# RUN apt-get install -y openjdk-8-jdk

# Instala Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN apt-get update && apt-get install -y nginx

COPY container/nginx/default.conf /etc/nginx/sites-available/default

# Define o diretório de trabalho
WORKDIR /var/www

# Copia os arquivos do projeto
COPY . .

# Ajusta permissões para Laravel
RUN chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache

RUN curl -fsSL https://deb.nodesource.com/setup_22.x | bash -

RUN apt install -y nodejs
    
RUN rm -rf /var/lib/apt/lists/*

# Substituir o socket padrão pelo modo TCP (porta 8080)
RUN sed -i "s|listen = /run/php/php8.2-fpm.sock|listen = 8080|" /etc/php/8.2/fpm/pool.d/www.conf

RUN git config --global --add safe.directory /var/www

RUN composer install

RUN cp .env.docker .env

ENV DEBIAN_FRONTEND=dialog

# Expõe portas do PHP-FPM
EXPOSE 8080 9003 5173

COPY container/start.sh /start.sh
RUN chmod +x /start.sh

# Inicia o PHP-FPM
CMD ["/start.sh"]