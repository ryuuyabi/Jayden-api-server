<?php

namespace App\Mail\Admin;

use App\Enums\Operator\Role;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class OperatorRegisteredNotion extends Mailable
{
    use Queueable;
    use SerializesModels;

    public readonly Role $role;

    /**
     * Create a new message instance.
     */
    public function __construct(int $role)
    {
        $this->role = Role::from($role);
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            from: new Address('ryuuyabi@gmail.com', config('app.name')),
            subject: '管理画面アカウント作成お知らせ',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'email.admin.operator_registered_notion',
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
