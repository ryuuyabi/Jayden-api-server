FROM php:8.3-fpm

COPY --from=composer /usr/bin/composer /usr/bin/composer

RUN \
    apt-get update && \
    apt-get install -y git zip unzip && \
    docker-php-ext-install pdo_mysql

RUN \
    apt-get update && \
    apt-get install -y nodejs npm

RUN curl -sSL https://github.com/mailhog/mhsendmail/releases/download/v0.2.0/mhsendmail_linux_amd64 -o mhsendmail && \
    chmod +x mhsendmail && \
    mv mhsendmail /usr/local/bin/mhsendmail
