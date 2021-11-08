<?php

namespace App\Notifications;

use App\Models\Patient;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewPatientSelfNotification extends Notification
{
    private $patient;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Patient $patient)
    {
        $this->patient = $patient;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->subject('Thank you for your registration.')
                    ->line('You have successfully registered as patient.')
                    ->line('Your details are:')
                    ->line('Name: '.$this->patient->name)
                    ->line('Address: '.$this->patient->address)
                    ->line('Phone: '.$this->patient->phone)
                    ->line('Email: '.$this->patient->email)
                    ->line('Symptoms: '.$this->patient->symptoms)
                    ->line('Thanks');
    }
}
