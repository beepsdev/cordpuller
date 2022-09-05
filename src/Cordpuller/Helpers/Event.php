<?php

namespace Cordpuller\Helpers;

use Cordpuller\Structs\Gateway\TypingStart;
use Cordpuller\Structs\Member;

class Event {

    const READY = "READY";
    const APPLICATION_COMMAND_PERMISSIONS_UPDATE = "APPLICATION_COMMAND_PERMISSIONS_UPDATE";

    // Channels
    const CHANNEL_CREATE = "CHANNEL_CREATE";
    const CHANNEL_UPDATE = "CHANNEL_UPDATE";
    const CHANNEL_DELETE = "CHANNEL_DELETE";

    // Message
    const MESSAGE_CREATE = "MESSAGE_CREATE";
    const MESSAGE_UPDATE = "MESSAGE_UPDATE";
    const MESSAGE_DELETE = "MESSAGE_DELETE";
    const TYPING_START = "TYPING_START";

    public static function parseEvent(string $event, array $data): ?BaseEvent
    {

        switch($event){
            case self::TYPING_START:
                return new TypingStart($data);
            case self::MESSAGE_CREATE:
            default:
                return null;
        }

    }

}