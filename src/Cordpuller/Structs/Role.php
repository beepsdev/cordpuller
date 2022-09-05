<?php

namespace Cordpuller\Structs;

use Cordpuller\Discord;
use Cordpuller\Helpers\BaseStruct;
use Cordpuller\Helpers\Snowflake;
use Cordpuller\Traits\HasGuild;

Class Role Extends BaseStruct {

    use HasGuild;

    /**
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public static function fetch(Snowflake|string $id, Snowflake|string $guild_id): static{
        $discord = Discord::getInstance();
        $response = $discord->ApiRequest('GET', 'guilds/' . $guild_id . '/roles/' . $id);
        return static::build($response);
    }


}