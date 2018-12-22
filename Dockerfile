FROM wordpress:5.0-php7.2

RUN apt-get update && apt-get install -y less wget subversion mysql-client apt-utils
RUN apt-get install -y libyaml-dev && pecl install yaml
RUN echo "extension=yaml.so" > /usr/local/etc/php/conf.d/docker-php-ext-yaml.ini

RUN wget https://phar.phpunit.de/phpunit-7.5.1.phar && \
    chmod +x phpunit-7.5.1.phar && \
    mv phpunit-7.5.1.phar /usr/local/bin/phpunit

RUN curl -O https://raw.githubusercontent.com/wp-cli/builds/gh-pages/phar/wp-cli.phar && \
    chmod +x wp-cli.phar && \
    mv wp-cli.phar /usr/local/bin/wp

COPY dev/wp-config.php /var/www/html/wp-config.php
