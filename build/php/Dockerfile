FROM ubuntu:17.10

RUN apt-get update && apt-get install -my \
	curl \
	wget \
	php-curl \
	php-fpm \
	php-gd \
	php-xsl \
	php-mcrypt \
	php-cli \
	php-intl \
	php-bz2 \
	php-zip \
	php-mbstring \
	git \
	zip \
	php-apcu \
	php-redis \
	php-opcache \
	php-amqp

RUN mkdir /run/php

ADD conf/www.conf /etc/php/7.1/fpm/pool.d/www.conf
ADD conf/php-fpm.conf /etc/php/7.1/fpm/php-fpm.conf

RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
RUN php composer-setup.php
RUN php -r "unlink('composer-setup.php');"
RUN mv composer.phar /usr/local/bin/composer
RUN chmod +x /usr/local/bin/composer
RUN ln -snf /usr/share/zoneinfo/Europe/Lisbon /etc/localtime

WORKDIR /var/www/html/symfony

EXPOSE 9000

CMD ["php-fpm7.1"]
