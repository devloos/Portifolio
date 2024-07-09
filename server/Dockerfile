# Code cherry picked from https://github.com/richarvey/nginx-php-fpm, Huge Thanks!
# Currently broken on latest 3.20, leaving it at 3.18 for now.
FROM php:8.2-fpm-alpine3.18

ENV php_conf=/usr/local/etc/php-fpm.conf
ENV fpm_conf=/usr/local/etc/php-fpm.d/www.conf
ENV php_vars=/usr/local/etc/php/conf.d/docker-vars.ini

ENV APP_ENV=production

# Install nginx and devel kit
RUN apk add --no-cache nginx \
    nginx-mod-devel-kit

# Install packages
RUN echo @testing https://dl-cdn.alpinelinux.org/alpine/edge/testing >> /etc/apk/repositories && \
    echo /etc/apk/respositories && \
    apk update && apk upgrade &&\
    apk add --no-cache \
    bash \
    wget \
    supervisor \
    curl \
    libcurl \
    libpq \
    python3 \
    py3-pip \
    dialog \
    autoconf \
    make \
    libzip-dev \
    bzip2-dev \
    icu-dev \
    tzdata \
    libpng-dev \
    libjpeg-turbo-dev \
    freetype-dev \
    libxslt-dev 

# Install system packages
RUN apk add --no-cache --virtual .sys-deps \
    musl-dev \
    linux-headers \
    augeas-dev \
    libmcrypt-dev \
    python3-dev \
    libffi-dev \
    sqlite-dev \
    imap-dev \
    postgresql-dev \
    libjpeg-turbo-dev \
    libwebp-dev \
    zlib-dev \
    libxpm-dev \
    libpng \
    libpng-dev

# Install PHP modules
ADD --chmod=0755 https://github.com/mlocati/docker-php-extension-installer/releases/latest/download/install-php-extensions /usr/local/bin/
RUN install-php-extensions @composer gd exif intl xsl soap zip

RUN docker-php-ext-configure gd \
      --enable-gd \
      --with-freetype \
      --with-jpeg && \
    pip install --upgrade pip && \
    docker-php-source delete

# after binaries compiled these packages are not needed
RUN apk del gcc musl-dev linux-headers libffi-dev augeas-dev python3-dev make autoconf && \
    apk del .sys-deps

# Make supervisor log
RUN mkdir -p /var/log/supervisor

ADD docker/supervisord.conf /etc/supervisord.conf

# Copy our nginx config
RUN rm -rf /etc/nginx/nginx.conf
ADD docker/nginx/nginx.conf /etc/nginx/nginx.conf

# nginx site conf
RUN mkdir -p /etc/nginx/sites-available/ && \
    mkdir -p /etc/nginx/sites-enabled/ && \
    mkdir -p /var/www/app

# add sites available and then create sym link to sites enabled
ADD docker/nginx/app.conf /etc/nginx/sites-available/default.conf
RUN ln -s /etc/nginx/sites-available/default.conf /etc/nginx/sites-enabled/default.conf

# tweak php-fpm config
RUN echo "cgi.fix_pathinfo=0" > ${php_vars} && \
    echo "upload_max_filesize = 100M"  >> ${php_vars} && \
    echo "post_max_size = 100M"  >> ${php_vars} && \
    echo "variables_order = \"EGPCS\""  >> ${php_vars} && \
    echo "memory_limit = 128M"  >> ${php_vars} && \
    sed -i \
        -e "s/;catch_workers_output\s*=\s*yes/catch_workers_output = yes/g" \
        -e "s/pm.max_children = 5/pm.max_children = 4/g" \
        -e "s/pm.start_servers = 2/pm.start_servers = 3/g" \
        -e "s/pm.min_spare_servers = 1/pm.min_spare_servers = 2/g" \
        -e "s/pm.max_spare_servers = 3/pm.max_spare_servers = 4/g" \
        -e "s/;pm.max_requests = 500/pm.max_requests = 200/g" \
        -e "s/user = www-data/user = nginx/g" \
        -e "s/group = www-data/group = nginx/g" \
        -e "s/;listen.mode = 0660/listen.mode = 0666/g" \
        -e "s/;listen.owner = www-data/listen.owner = nginx/g" \
        -e "s/;listen.group = www-data/listen.group = nginx/g" \
        -e "s/listen = 127.0.0.1:9000/listen = \/var\/run\/php-fpm.sock/g" \
        -e "s/^;clear_env = no$/clear_env = no/" \
        ${fpm_conf}

# Enable caching for blazingly fast performance
RUN cp /usr/local/etc/php/php.ini-development /usr/local/etc/php/php.ini && \
	sed -i \
	    -e "s/;opcache/opcache/g" \
	    -e "s/;zend_extension=opcache/zend_extension=opcache/g" \
            /usr/local/etc/php/php.ini

ADD errors/ /var/www/errors

WORKDIR "/var/www/app"

COPY . .

RUN chmod 755 docker/scripts/startup.sh

EXPOSE 8080 443

CMD ["/var/www/app/docker/scripts/startup.sh"]