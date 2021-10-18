FROM php:8-apache

WORKDIR /var/html

COPY ./vhost.conf /etc/apache2/sites-available/000-default.conf

COPY ./.env.example .env

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN docker-php-ext-install pdo pdo_mysql exif pcntl bcmath

CMD composer install --ignore-platform-reqs --no-scripts

RUN chown -R www-data:www-data /var/www/html && a2enmod rewrite

CMD php artisan key:generate

CMD "php artisan migrate --seed"

CMD apachectl -D FOREGROUND