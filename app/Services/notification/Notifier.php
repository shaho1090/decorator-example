<?php


namespace App\Services\notification;


use App\Services\DashesToCamelCase;

class Notifier
{
    private array $channels;
    private string $message;
    private array $result;

    public function __construct(array $channels)
    {
        $this->channels = $channels;
        $this->message = "your notification has been sent";
    }

    /**
     * @return array
     */
    public function handle(): array
    {
        $channelClassNames = $this->getChannelClassNames($this->channels);

        return $this->broadcastViaAllChannels($channelClassNames);
    }

    /**
     * @param $channels
     * @return array
     */
    private function getChannelClassNames($channels): array
    {
        $channelClassNames = [];

        foreach ($channels as $channel) {

            $channelClassName = (new DashesToCamelCase())->convert($channel, true);

            $channelClassNames[] = __NAMESPACE__ . "\\Channels\\" . $channelClassName;
        }

        return $channelClassNames;
    }

    /**
     * @param string $channelClassName
     * @return string
     */
    private function broadcastVia(string $channelClassName):string
    {
       return (new $channelClassName())->send($this->message);
    }

    /**
     * @param array $channelClassNames
     * @return array
     */
    private function broadcastViaAllChannels(array $channelClassNames): array
    {
        foreach ($channelClassNames as $channelClassName){
            $this->result[] = $this->broadcastVia($channelClassName);
        }

        return $this->result;
    }
}
