<?php

namespace App\Listeners;

use App\Events\PatientRegisteredEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Notification;
use App\Notifications\NewPatientSelfNotification;
use App\Notifications\NewPatientDoctorNotification;

class SendNewPatientNotifications
{
    protected $patient;

    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  PatientRegisteredEvent  $event
     * @return void
     */
    public function handle(PatientRegisteredEvent $event)
    {
        //email notification to doctor
        Notification::route('mail', getenv('TEST_DOCTOR_EMAIL'))->notify(new NewPatientSelfNotification($event->patient));

        //email notification to patient
        Notification::route('mail', $event->patient->email)->notify(new NewPatientDoctorNotification($event->patient));
    }
}
