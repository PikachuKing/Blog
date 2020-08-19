FROM php:7.3-fpm
RUN sed -i 's/deb.debian.org/mirrors.163.com/g' /etc/apt/sources.list && \
    sed -i 's/security.debian.org/mirrors.163.com/g' /etc/apt/sources.list
RUN apt-get update && \
    apt-get install -y nodejs npm
RUN npm config set registry https://registry.npm.taobao.org
RUN docker-php-ext-install pdo_mysql
WORKDIR /var/www
