<?php

namespace Cordpuller_old\interactions;

use Cordpuller_old\libs\builder\EmbedBuilder;
use Cordpuller_old\libs\fieldmaps\InteractionResponseTypes;
use Cordpuller_old\libs\flags\MessageFlags;
use JetBrains\PhpStorm\NoReturn;

class ApplicationCommandInteraction extends Interaction {

    protected string $name;
    protected int $type;
    protected ?array $resolved;
    protected ?string $options;

    public function reply(string $message, ?EmbedBuilder $embed = null, ?MessageFlags $flags = null): void {
        http_response_code(200);

        $response = array(
            "type" => InteractionResponseTypes::CHANNEL_MESSAGE_WITH_SOURCE,
            "data" => array(
                "tts" => false,
                "flags" => $flags->value(),
                "content" => $message,
                "allowed_mentions" => array("parse" => array())
            )
        );

        if($embed != null){
            $response['data']['embeds'] = array($embed);
        }

        if($flags != null){
            $response['data']['flags'] = $flags->value();
        }

        echo json_encode($response);

    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return int
     */
    public function getType(): int
    {
        return $this->type;
    }

    /**
     * @param int $type
     */
    public function setType(int $type): void
    {
        $this->type = $type;
    }

    /**
     * @return array|null
     */
    public function getResolved(): ?array
    {
        return $this->resolved;
    }

    /**
     * @param array|null $resolved
     */
    public function setResolved(?array $resolved): void
    {
        $this->resolved = $resolved;
    }

    /**
     * @return string|null
     */
    public function getGuildId(): ?string
    {
        return $this->guild_id;
    }

    /**
     * @param string|null $guild_id
     */
    public function setGuildId(?string $guild_id): void
    {
        $this->guild_id = $guild_id;
    }

    /**
     * @return string|null
     */
    public function getOptions(): ?string
    {
        return $this->options;
    }

    /**
     * @param string|null $options
     */
    public function setOptions(?string $options): void
    {
        $this->options = $options;
    }

}