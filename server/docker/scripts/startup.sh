#!/bin/bash

# Enable custom nginx config files if they exist
if [ -f /var/www/app/docker/nginx/nginx.conf ]; then
  cp /var/www/app/docker/nginx/nginx.conf /etc/nginx/nginx.conf
fi

if [ -f /var/www/app/docker/nginx/app.conf ]; then
  cp /var/www/app/docker/nginx/app.conf /etc/nginx/sites-available/default.conf
fi

# Display PHP error's or not
if [[ "$ERRORS" == "1" ]] ; then
  echo php_flag[display_errors] = on >> /usr/local/etc/php-fpm.d/www.conf
else
  echo php_flag[display_errors] = off >> /usr/local/etc/php-fpm.d/www.conf
fi

# Set the desired timezone
echo date.timezone=America/Los_Angeles > /usr/local/etc/php/conf.d/timezone.ini

# Display errors in docker logs
if [ ! -z "$PHP_ERRORS_STDERR" ]; then
  echo "log_errors = On" >> /usr/local/etc/php/conf.d/docker-vars.ini
  echo "error_log = /dev/stderr" >> /usr/local/etc/php/conf.d/docker-vars.ini
fi

chown -Rf nginx.nginx /var/www/app

if [ -f "/var/www/app/composer.lock" ]; then
  composer install --no-dev --working-dir=/var/www/app
fi

# Start supervisord and services
exec /usr/bin/supervisord -n -c /etc/supervisord.conf
