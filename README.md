# Snapforms Coding Challenge

## Setup
* Copy provided .env.docker and .env.docker.testing to project
* Install [Docker](https://docs.docker.com/get-started/)
* Build: `docker compose build`
* Run: `docker compose up`
* Migrations will run from app-entrypoint.sh
* Run tests:
`docker compose exec snapforms-backend php /var/www/artisan config:clear`
`docker compose exec snapforms-backend php /var/www/artisan test --env=testing`

* Application: http://localhost