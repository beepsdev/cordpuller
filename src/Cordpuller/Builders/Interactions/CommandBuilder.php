<?php

namespace Cordpuller\Builders\Interactions;

use Exception;
use JsonSerializable;

class CommandBuilder implements JsonSerializable {

    protected int $type;
    protected ?string $guild_id = null;
    protected string $name;
    protected array $name_localizations = array();
    protected ?string $description = null;
    protected ?array $description_localizations = array();
    protected array $options = array();

    public function setType(int $type): static
    {
        $this->type = $type;
        return $this;
    }

    public function setGuild(string $id): static
    {
        $this->guild_id = $id;
        return $this;
    }

    public function setName(string $name): static
    {
        $this->name = $name;
        return $this;
    }

    public function addLocalizedName(string $lang, string $name): static
    {
        $this->name_localizations[$lang] = $name;
        return $this;
    }

    public function setDescription(string $desc): static
    {
        $this->description = $desc;
        return $this;
    }

    public function addLocalizedDescription(string $lang, string $desc): static
    {
        $this->description_localizations[$lang] = $desc;
        return $this;
    }

    public function addOption(CommandOption $option): static
    {
        $this->options[] = $option;
        return $this;
    }

    public function jsonSerialize(){
        return array(
            "type"=>$this->type,
            "name"=>$this->name,
            "description"=>$this->description,
            "name_localizations"=>$this->name_localizations,
            "description_localizations"=>$this->description_localizations,
            "guild_id"=>$this->guild_id
        );
    }

}