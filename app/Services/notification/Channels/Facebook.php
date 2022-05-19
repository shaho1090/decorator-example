<?php


namespace App\Services\notification\Channels;


use App\Services\notification\ChannelInterface;

class Facebook implements ChannelInterface
{
    public function send(string $message): string
    {
       return $message.', via facebook';
    }
}
