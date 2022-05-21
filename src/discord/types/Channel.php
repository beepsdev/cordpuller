<?php

namespace Cordpuller\types;

use Cordpuller\Discord;
use Cordpuller\flags\ChannelTypes;

class Channel extends Base {

    static $ENDPOINT = 'channels';

    protected int $type;
    protected string $name;

    /**
     * @return int
     */
    public function getType(): int
    {
        return $this->type;
    }

    /**
     * @param int $type
     */
    public function setType(int $type): void
    {
        $this->type = $type;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public static function createFromResponse( Discord $client, Array $json, Base|null $obj = null): static
    {

        if($obj == null){
            $obj = new static();
        }

        // We have classes for different channel types.
        switch($json['type']){
            case ChannelTypes::GUILD_TEXT;
                $obj = new TextChannel();
                break;
            case ChannelTypes::DM;
                $obj = new DmChannel();
                break;
        }

        return parent::createFromResponse($client, $json, $obj);

    }


}