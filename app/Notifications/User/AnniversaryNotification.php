<?php

namespace App\Notifications\User;

use App\Channel\SMSChannel;
use App\Models\MessageDraft;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class AnniversaryNotification extends Notification
{
    use Queueable;
    
    /**
     * Anniversary Message
     *
     * @var string
     */
    protected $message;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->message = MessageDraft::anniversaryDraft();
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
                    ->subject('HAPPY ANNIVERSARY !')
                    ->markdown('mails.admin_message', ['message'=> $this->message]);
    }
    
    /**
     * Get the SMS representation of the notification
     *
     * @param $notifiable $notifiable [explicite description]
     *
     * @return string
     */
    public function toSMS($notifiable)
    {
        $msg = "Dear $notifiable->name, ".PHP_EOL;
        $msg.= $this->message.PHP_EOL;
        return $msg;
    }
}
