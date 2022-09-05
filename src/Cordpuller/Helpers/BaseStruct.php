<?php

namespace Cordpuller\Helpers;

abstract class BaseStruct {

    use Buildable;

    protected Snowflake $id;

    public function getId(): Snowflake
    {
        return $this->id;
    }

    protected function setId(string|Snowflake $id): void
    {
        $this->id = Snowflake::create($id);
    }

    public static function fromEvent(array $data): static{
        return static::build($data);
    }

}