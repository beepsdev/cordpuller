<?php

namespace Cordpuller\Structs;


use Cordpuller\Builders\Bitfields\UserPublicFlags;
use Cordpuller\Discord;
use Cordpuller\Helpers\BaseEvent;
use Cordpuller\Helpers\Snowflake;
use Cordpuller\Helpers\UtilMethods;
use Cordpuller\Helpers\DiscordMedia;
use DateTime;

Class Member Extends BaseEvent {

    protected ?User $user;
    protected ?string $nick = null;
    protected ?string $avatar = null;
    protected array $roles = [];
    protected DateTime $joined_at;
    protected ?DateTime $premium_since;
    protected bool $deaf;
    protected bool $mute;
    protected ?bool $pending;
    protected ?string $permissions;
    protected ?DateTime $communication_disabled_until;

    /**
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public static function fetch(Snowflake|string $id, Snowflake|string $guild_id): static{
        $discord = Discord::getInstance();
        $response = $discord->ApiRequest('GET', 'guilds/' . $guild_id . '/members/' . $id);
        return static::build($response);
    }


}