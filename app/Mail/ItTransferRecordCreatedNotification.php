<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Envelope;

class ItTransferRecordCreatedNotification extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(public readonly array $formData)
    {
    }

    public function build(): ItTransferRecordCreatedNotification
    {
        return $this->subject('New IT Asset Transfer Form Created')
            ->view('emails.it-transfer.created-notification')
            ->with([
                'fromAdminName' => $this->formData['from_admin_name'],
                'toAdminName' => $this->formData['to_admin_name'],
                'approvedBy' => $this->formData['approved_by_name'],
            ]);
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'It Transfer Record Created Notification',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'view.name',
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
