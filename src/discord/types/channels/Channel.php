<?php

namespace Cordpuller\types\channels;

use Cordpuller\Discord;
use Cordpuller\libs\fieldmaps\ChannelTypes;
use Cordpuller\types\Base;

class Channel extends Base {

    static $ENDPOINT = 'channels';

    protected int $type;
    protected string $name;
    protected string $last_message_id;

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
            case ChannelTypes::GUILD_VOICE;
                $obj = new VoiceChannel();
                break;
            case ChannelTypes::GROUP_DM;
                $obj = new GroupChannel();
                break;
            case ChannelTypes::GUILD_CATEGORY;
                $obj = new CategoryChannel();
                break;
            case ChannelTypes::GUILD_NEWS;
                $obj = new NewsChannel();
                break;
            case ChannelTypes::GUILD_NEWS_THREAD;
            case ChannelTypes::GUILD_PUBLIC_THREAD;
            case ChannelTypes::GUILD_PRIVATE_THREAD;
                $obj = new ThreadChannel();
                break;
            case ChannelTypes::GUILD_STAGE_VOICE;
                $obj = new StageChannel();
                break;
            case ChannelTypes::GUILD_DIRECTORY;
                $obj = new DirectoryChannel();
                break;
            case ChannelTypes::GUILD_FORUM;
                $obj = new ForumChannel();
                break;
        }

        return parent::createFromResponse($client, $json, $obj);

    }


}