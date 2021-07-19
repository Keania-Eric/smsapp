<?php
namespace App\Channel;

use App\Models\SMSLog;
use App\Contracts\ShortMessageService;
use Illuminate\Notifications\Notification;


class SMSChannel
{
    private $messsageService;

    public function __construct(ShortMessageService $messageService)
    {
        $this->messageService  = $messageService;
    }

     /**
     * Send the given notification.
     *
     * @param  mixed  $notifiable
     * @param  \Illuminate\Notifications\Notification  $notification
     * @return void
     */
    public function send($notifiable, Notification $notification)
    {
        $message = $notification->toSMS($notifiable);

        // Send notification to the $notifiable instance...
        $response = $this->messageService->sendSMS($message, $notifiable->phone);

        // Log the responds
        $this->logToSMS($response, $notifiable, $notification);
    }

    
    /**
     * Method logToSMS
     *
     * @param $response $response [explicite description]
     * @param $notifiable $notifiable [explicite description]
     * @param $notification $notification [explicite description]
     *
     * @return void
     */
    protected function logToSMS($response, $notifiable, $notification)
    {
        SMSLog::create([
            'type'=> get_class($notification),
            'phone'=> $notifiable->phone,
            'message'=> $response->getStatus(),
            'code'=> $response->getStatusCode()
        ]);
    }
}