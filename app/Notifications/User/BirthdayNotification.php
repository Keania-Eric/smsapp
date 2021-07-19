<?php

namespace App\Notifications\User;

use App\Channel\SMSChannel;
use App\Models\MessageDraft;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class BirthdayNotification extends Notification
{
    use Queueable;
    
    /**
     * message
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
        $this->message = MessageDraft::birthdayDraft();
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
                ->subject('HAPPY BIRTHDAY !')
                ->markdown('mails.birthday', ['message'=> $this->message, 'notifiable'=>$notifiable]);
    }
    
    /**
     * Get the sms representation of the notification
     *
     * @param  mixed  $notifiable
     * @return string
     */
    public function toSMS($notifiable)
    {
        $msg = "Dear $notifiable->name, ".PHP_EOL;
        $msg.= $this->message.PHP_EOL;
        return $msg;
    }
}
