<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Mail\IssueUpdated;


class IssueUpdated extends Mailable
{
    use Queueable, SerializesModels;

    public $issue;

    public function __construct($issue)
    {
        $this->issue = $issue;
    }

    public function build()
    {
        return $this->subject('Issue Updated')
                    ->view('emails.issue-updated');
            
    }
    public function toMail($notifiable)
        {
            return (new MailMessage)
                ->subject('Issue Updated')
                ->line('This issue has been assigned to you.')
                ->action('View Issue', route('view-issue', ['id' => $this->issue->id]))
                ->line('Thank you for using our application!');
        }
}
