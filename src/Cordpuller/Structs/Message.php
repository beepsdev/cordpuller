<?php

namespace Cordpuller\Structs;

use Cordpuller\Discord;
use Cordpuller\Helpers\BaseStruct;
use Cordpuller\Helpers\Snowflake;

Class Message Extends BaseStruct {

    /**
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public static function fetch(Snowflake|string $id, Snowflake|string $channel_id): static{
        $discord = Discord::getInstance();
        $response = $discord->ApiRequest('GET', 'channels/'. $channel_id . '/messages/' . $id);
        return static::build($response);
    }


}