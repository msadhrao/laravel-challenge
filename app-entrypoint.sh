#!/bin/bash

cp /var/www/.env.docker /var/www/.env
cp /var/www/.env.docker.testing /var/www/.env.testing

php /var/www/artisan config:clear
php /var/www/artisan config:cache
php /var/www/artisan cache:clear
php /var/www/artisan view:clear
php /var/www/artisan view:cache
php /var/www/artisan route:cache

# Required if - or an application without a
# database connection will cause the script to fail
if php /var/www/artisan migrate:fresh ;
then
   echo 'Migration successful!'
else
   echo 'Migration unsuccessful!'
fi

exec "$@"