<?php

namespace App\Notifications\Admin;

use App\Channel\SMSChannel;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class MailNotification extends Notification
{
    use Queueable;
    
    /**
     * message
     *
     * @var string
     */
    protected $message;
    
    /**
     * subject
     *
     * @var string
     */
    protected $subject;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($subject, $message)
    {
        //
        $this->message = $message;
        $this->subject = $subject;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail', SMSChannel::class];
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
                    ->subject($this->subject)
                    ->markdown('mails.admin_message', ['message'=> $this->message]);
    }
    
    /**
     * Method toSMS
     *
     * @param $notifiable $notifiable [explicite description]
     *
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toSMS($notifiable)
    {
        $msg = "Dear $notifiable->name, ".PHP_EOL;
        $msg.= $this->message.PHP_EOL;

        return $msg;
    }
}
