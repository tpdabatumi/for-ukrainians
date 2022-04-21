<?php

namespace App\Notifications;

use Illuminate\Notifications\Notification;
use NotificationChannels\Telegram\TelegramMessage;

class ErrorNotification extends Notification
{
    public $error;

    public function __construct($error)
    {
        $this->error = $error;
    }

    public function via()
    {
        return ['telegram'];
    }

    public function toTelegram()
    {
        return TelegramMessage::create()
            ->to(config('services.my_telegram_id'))
            ->content(
                'საიტზე დაფიქსირდა შეცდომა:' . "\n\n" . 'აღწერა: ' . $this->error . "\n" . 'ბმული: ' . request()->url() . "\n" . 'დრო: ' . now() . "\n" . 'IP მისამართი: ' . request()->ip() . "\n" . 'მოწყობილობა: ' . request()->header('User-Agent') . "\n" . 'მომხმარებელი: ' . auth()->user()->name
            );
    }
}
