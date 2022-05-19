<?php


namespace App\Services\notification\Channels;


use App\Services\notification\ChannelInterface;

class Email implements ChannelInterface
{
    public function send(string $message): string
    {
        return $message.', via email';
    }
}
