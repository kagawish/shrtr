FROM ubuntu:16.04

LABEL maintainer="Karim Gawish"

RUN apt-get update \
    && apt-get install -y locales \
    && locale-gen en_US.UTF-8

RUN locale-gen en_US.UTF-8

ENV LANG en_US.UTF-8
ENV LANGUAGE en_US:en
ENV LC_ALL en_US.UTF-8

RUN apt-get update \
    && apt-get install -y vim nginx curl zip unzip git software-properties-common supervisor cron \
    && add-apt-repository -y ppa:ondrej/php \
    && apt-get update \
    && apt-get install -y php7.2-fpm php7.2-cli php7.2-gd php7.2-mysql \
       php7.2-imap php-memcached php7.2-mbstring php7.2-xml php7.2-curl php7.2-bcmath \
    && php -r "readfile('http://getcomposer.org/installer');" | php -- --install-dir=/usr/bin/ --filename=composer \
    && mkdir /run/php \
    && apt-get remove -y --purge software-properties-common \
    && apt-get -y autoremove \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* \
    && echo "daemon off;" >> /etc/nginx/nginx.conf \
    && ln -sf /dev/stdout /var/log/nginx/access.log \
    && ln -sf /dev/stderr /var/log/nginx/error.log

COPY docker/default.conf /etc/nginx/sites-available/default

COPY docker/php-fpm.conf /etc/php/7.2-fpm/php-fpm.conf

COPY docker/php.ini /etc/php/7.2-fpm/php.ini

EXPOSE 80

COPY docker/supervisord.conf /etc/supervisor/conf.d/supervisord.conf

COPY . /var/www/

CMD ["/usr/bin/supervisord"]