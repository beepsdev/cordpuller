<?php

namespace Cordpuller\Structs;

use Cordpuller\Discord;
use Cordpuller\Helpers\BaseStruct;
use Cordpuller\Helpers\Snowflake;

Class Guild Extends BaseStruct {

    /**
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public static function fetch(Snowflake|string $id): static{
        $discord = Discord::getInstance();
        $response = $discord->ApiRequest('GET', 'guilds/' . $id);
        return static::build($response);
    }


}