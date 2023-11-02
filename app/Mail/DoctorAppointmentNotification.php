<?php

namespace App\Mail;

use App\Models\AppointmentBooking;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Queue\SerializesModels;

class DoctorAppointmentNotification extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */

     public $appointment;
     public $patient;
     public $doctor;
 
     public function __construct(AppointmentBooking $appointment, User $patient, User $doctor)
     {
         $this->appointment = $appointment;
         $this->patient = $patient;
         $this->doctor = $doctor;
     }

    public function build()
    {
        return $this->view('emails.doctor_notification')
                    ->subject('Doctor Appointment Notification');
    }
    

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Doctor Appointment Notification',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.doctor_notification', 
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }

}
