<?php

namespace App\Mail;

use App\Models\Disbursement;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class WithdrawalApprovedMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(
        public Disbursement $withdrawal
    ) {}

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Withdrawal Request Approved',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.withdrawal-approved',
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
