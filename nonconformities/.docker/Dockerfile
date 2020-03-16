FROM php:7.4-fpm-alpine
RUN apk update
RUN apk add --no-cache openssl bash mysql-client alpine-sdk autoconf librdkafka-dev
RUN docker-php-ext-install pdo_mysql bcmath
RUN pecl install rdkafka \
        && docker-php-ext-enable rdkafka

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
COPY --from=composer /usr/bin/composer /usr/bin/composer

WORKDIR /var/www

RUN rm -rf /var/www/html
RUN ln -s public html

COPY . .

EXPOSE 9000