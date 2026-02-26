<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use App\Models\Invitation;
use App\Models\Colocation;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class Mail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    use Queueable, SerializesModels;

    public function __construct(
        public Invitation $invitation,
        public Colocation $colocation,
    ) {}

    public function envelope(): Envelope {
        return new Envelope(
            subject: "Invitation à rejoindre {$this->colocation->name}"
        );
    }

    public function content(): Content {
        return new Content(view: 'emails.invitation', with: [
            'invitation' => $this->invitation,
            'colocation' => $this->colocation,
        ]);
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
