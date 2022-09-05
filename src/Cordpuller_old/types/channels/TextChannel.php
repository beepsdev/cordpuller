<?php

namespace Cordpuller_old\types\channels;

class TextChannel extends GuildChannel {

    protected string $topic;

    /**
     * @return string
     */
    public function getTopic(): string
    {
        return $this->topic;
    }

    /**
     * @param string $topic
     */
    public function setTopic(string $topic): void
    {
        $this->topic = $topic;
    }

}