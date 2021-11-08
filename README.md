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

## Information
* I have created routes for the application in route.php
* Tests are in file tests/Feature/PatientCreateTest.php
* I have used a Controller app\Http\Controllers\PatientController.php and model app\Models\Patient.php to add the challenge functionality
* To keep validation logic seperate I have used app\Http\Requests\PatientRequest.php
* I have created an event to seperate logic handling email notifications app\Events\PatientRegisteredEvent.php and corresponding listener app\Listeners\SendNewPatientNotifications.php
* Listener sends notifications using app\Notifications\NewPatientSelfNotification.php and app\Notifications\NewPatientDoctorNotification.php