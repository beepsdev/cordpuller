<?php

namespace Cordpuller\Structs\Gateway\EventGroups;
use Cordpuller\Helpers\BaseEvent;
use Cordpuller\Helpers\Snowflake;
use Cordpuller\Structs\Guild;

class GuildEvent extends BaseEvent {


    public function __construct()
    {
        if(isset($data['guild_id'])){
            $this->guild_id = $data['guild_id'];
        }
    }

}