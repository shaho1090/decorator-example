<?php


namespace App\Services\notification;


Interface ChannelInterface
{
    public function send(string $message);
}
