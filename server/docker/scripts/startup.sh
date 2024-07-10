#!/bin/bash

# Enable custom nginx config files if they exist
if [ -f /var/www/app/docker/nginx/nginx.conf ]; then
  cp /var/www/app/docker/nginx/nginx.conf /etc/nginx/nginx.conf
fi

if [ -f /var/www/app/docker/nginx/app.conf ]; then
  cp /var/www/app/docker/nginx/app.conf /etc/nginx/sites-available/default.conf
fi

# Set the desired timezone
echo date.timezone=America/Los_Angeles > /usr/local/etc/php/conf.d/timezone.ini

if [ -f "/var/www/app/composer.lock" ]; then
  composer install --no-dev --working-dir=/var/www/app
fi

# Start supervisord and services
exec /usr/bin/supervisord -n -c /etc/supervisord.conf
