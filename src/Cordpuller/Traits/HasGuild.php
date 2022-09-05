<?php

namespace Cordpuller\Traits;

use Cordpuller\Helpers\Snowflake;

trait HasGuild {

    protected Snowflake $guild_id;

    public function getGuildId(): Snowflake
    {
        return $this->guild_id;
    }

    protected function setGuildId(string|Snowflake $id): void
    {
        $this->guild_id = Snowflake::create($id);
    }

}