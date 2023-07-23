<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Notifications\Messages\MailMessage;

class IssueAssignedNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $issue;

    /**
     * Create a new message instance.
     *
     * @param  mixed  $issue
     * @return void
     */
    public function __construct($issue)
    {
        $this->issue = $issue;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('New Issue Assigned')
                    ->view('emails.issue_assigned');
    }
    public function toMail($notifiable)
        {
            return (new MailMessage)
                ->subject('Issue Assigned')
                ->line('An issue has been assigned to you.')
                ->action('View Issue', route('view-issue', ['id' => $this->issue->id]))
                ->line('Thank you for using our application!');
        }

}
