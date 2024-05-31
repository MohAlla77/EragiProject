<?php

namespace App\Mail;

use App\Models\Car;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class AddCarMail extends Mailable
{
    use Queueable, SerializesModels;

    private User $user ;
    private Car $car ;

    /**
     * Create a new message instance.
     */
    public function __construct(User $user, Car $car)
    {
        //
        $this->user = $user;
        $this->car  = $car;
        ;

    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Add Car Mail' . config('app.name'),
            from: 'Support@CarInch.com'
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'Emails.AddCarMail',
            with: [
                'user' => $this->user,
                'car' => $this->car

            ]
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
