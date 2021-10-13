FROM php:7.3-apache

# Update server packages
RUN apt-get update
RUN apt-get upgrade -y

# Install MySQLi
RUN docker-php-ext-install pdo pdo_mysql mysqli
RUN docker-php-ext-enable mysqli

# Enable mod_rewrite
RUN a2enmod rewrite
RUN service apache2 restart

# Setup Apache
ADD ../ /var/www/html/

# Setup PHP
ADD ./php.ini /usr/local/etc/php/conf.d/php-overrides.ini

# Update and install modules
RUN apt-get update
RUN apt-get install -y nano
RUN apt-get install -y zip

# Install xDebug
RUN pecl install xdebug \
    && echo "zend_extension=$(find /usr/local/lib/php/extensions/ -name xdebug.so)" > /usr/local/etc/php/conf.d/xdebug.ini \
    && echo "xdebug.mode=coverage" >> /usr/local/etc/php/conf.d/xdebug.ini \
    && echo "xdebug.start_with+request=yes" >> /usr/local/etc/php/conf.d/xdebug.ini

# Add Composer
# TODO: Replace hardcoded values in Git setup
RUN curl -sS https://getcomposer.org/installer | php && \
    mv composer.phar /usr/local/bin/composer && \
    chmod a+x /usr/local/bin/composer && \
    cd / && \
    rm -rf /tmp/composer && \
    apt-get install git -y && \
    git config --global user.name "Keiron Lowe" && \
    git config --global user.email "keiron.lowe@edriving.com" && \
    git --version

EXPOSE 80
