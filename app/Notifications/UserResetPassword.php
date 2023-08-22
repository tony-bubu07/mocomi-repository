<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class UserResetPassword extends Notification
{
    use Queueable;

    /**
    * The password reset token.
    * 
    * @var string
    */
    public $token;

    /**
     * Create a new notification instance.
     *
     * @param string $token
     * @return void
     */
    public function __construct($token)
    {
        $this->token = $token;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

     /**
    * Get the mail representation of the notification.
    *
    * @param  mixed  $notifiable
    * @return \Illuminate\Notifications\Messages\MailMessage
    */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('パスワード再設定')
            ->greeting('平素よりアプリをご利用いただきありがとうございます')
            ->line('下のボタンをクリックしてパスワードを再設定してください。')
            ->action(__('パスワードを再設定'), url(config('/').route('password.reset', $this->token, false)))
            ->line('もしこのメールに心当たりがない場合は、そのまま削除してください。');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
