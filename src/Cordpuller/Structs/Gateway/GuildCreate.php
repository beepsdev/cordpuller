<?php

namespace Cordpuller\Structs\Gateway;
use Cordpuller\Helpers\Snowflake;
use Cordpuller\Helpers\UtilMethods;
use Cordpuller\Structs\Gateway\EventGroups\GuildEvent;
use Cordpuller\Structs\Guild;
use Cordpuller\Structs\User;

class GuildCreate extends GuildEvent {

    protected Guild $guild;

    public function __construct($data)
    {
        parent::__construct();


    }

    public function getGuildId(): Snowflake
    {
        return $this->guild_id;
    }

    public function getGuild(): Guild
    {
        if($this->guild_id == null){
            throw new \Error("Tried to fetch guild when there was none.");
        }

        if($this->guild){
            return $this->guild;
        }

        return Guild::fetch($this->guild_id);
    }


}