FROM wordpress:5.0-php7.2

RUN apt-get update && apt-get install -y less wget mysql-client apt-utils
RUN apt-get install -y libyaml-dev && pecl install yaml
RUN echo "extension=yaml.so" > /usr/local/etc/php/conf.d/docker-php-ext-yaml.ini

RUN curl -sS https://getcomposer.org/installer | php && mv composer.phar /usr/local/bin/composer && chmod +x /usr/local/bin/composer
RUN composer require phpunit/phpunit:7.5.1

RUN curl -O https://raw.githubusercontent.com/wp-cli/builds/gh-pages/phar/wp-cli.phar && \
    chmod +x wp-cli.phar && \
    mv wp-cli.phar /usr/local/bin/wp

COPY dev/wp-config.php /var/www/html/wp-config.php
