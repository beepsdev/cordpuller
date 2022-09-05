<?php

namespace Cordpuller\Structs\Gateway;
use Cordpuller\Helpers\BaseEvent;
use Cordpuller\Helpers\Event;
use Cordpuller\Helpers\Snowflake;
use Cordpuller\Helpers\UtilMethods;
use Cordpuller\Structs\Member;
use Cordpuller\Structs\User;

class TypingStart extends BaseEvent {

    protected Snowflake $user_id;
    protected Snowflake $channel_id;
    protected Snowflake $guild_id;

    public function __construct($data)
    {

        UtilMethods::log('event data: ' . json_encode($data));

        $this->user_id = new Snowflake($data['user_id']);
        $this->guild_id = new Snowflake($data['guild_id']);
        $this->channel_id = new Snowflake($data['channel_id']);

    }

    public function getUser(): User
    {
        return User::fetch($this->user_id);
    }

    public function getUserId(): Snowflake
    {
        return $this->user_id;
    }

    public function getChannelId(): Snowflake
    {
        return $this->channel_id;
    }

    public function getGuildId(): Snowflake
    {
        return $this->guild_id;
    }

}