<?php

namespace Cordpuller\Helpers;
use JsonSerializable;

class Snowflake implements JsonSerializable {

    const DISCORD_EPOCH = 1420070400000;
    public readonly string $id;

    public static function create($id){
        return ($id instanceof Snowflake ? $id : new Snowflake($id));
    }

    public function __construct(string $snowflake)
    {
        $this->id = $snowflake;
    }

    public function getCreationDate(): int{
        return static::DISCORD_EPOCH  + ($this->id >> 22);
    }

    public function __toString(): string
    {
        return $this->id;
    }

    public function jsonSerialize(): string
    {
        return $this->id;
    }
}