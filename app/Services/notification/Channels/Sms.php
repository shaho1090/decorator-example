<?php


namespace App\Services\notification\Channels;


use App\Services\notification\ChannelInterface;

class Sms implements ChannelInterface
{
    public function send(string $message): string
    {
        return $message.', via sms';
    }
}
