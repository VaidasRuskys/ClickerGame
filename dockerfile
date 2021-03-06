FROM php:7.2.5-fpm
RUN yes | pecl install xdebug \
    && echo "zend_extension=$(find /usr/local/lib/php/extensions/ -name xdebug.so)" > /usr/local/etc/php/conf.d/xdebug.ini \
    && echo "xdebug.remote_enable=on" >> /usr/local/etc/php/conf.d/xdebug.ini \
    && echo "xdebug.remote_autostart=off" >> /usr/local/etc/php/conf.d/xdebug.ini
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN apt-get update && apt-get install -y git libpng-dev
RUN docker-php-ext-install zip && docker-php-ext-enable zip
RUN apt-get update && apt-get install -y libmcrypt-dev mysql-client && docker-php-ext-install pdo pdo_mysql
RUN mkdir -p /var/www
COPY ./code/ /var/www/
RUN cd /var/www/
RUN php /usr/local/bin/composer install --no-interaction --working-dir /var/www/
RUN chmod +x /var/www/bin/console
EXPOSE 8080
CMD php /var/www/bin/console server:run 0.0.0.0:8080
VOLUME /var/www/