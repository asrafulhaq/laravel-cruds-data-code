<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class StaffConfirmNotification extends Notification
{
    use Queueable;

    private $name;
    private $email;
    private $cell;
    private $photo;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this -> name = $data['name'];
        $this -> email = $data['email'];
        $this -> cell = $data['cell'];
        $this -> photo = $data['photo'];
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
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
                    ->greeting('Hi ' . $this -> name )
                    ->line('You are welcome to our LaraCrud Apps')
                    ->line('Email : ' . $this -> email )
                    ->line('Cell : ' . $this -> cell ) 
                    ->action('Active your account', url('/'))
                    ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
