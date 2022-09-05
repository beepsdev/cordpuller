<?php

namespace Cordpuller\Builders\Bitfields;

use Cordpuller_old\libs\Bitfield;

Class SystemChannelFlags extends Bitfield {

    static $FLAGS = array(
        "SUPPRESS_JOIN_NOTIFICATIONS" => 1<<0,
        "SUPPRESS_PREMIUM_SUBSCRIPTIONS" => 1<<1,
        "SUPPRESS_GUILD_REMINDER_NOTIFICATIONS" => 1<<2,
        "SUPPRESS_JOIN_NOTIFICATION_REPLIES" => 1<<3,
    );

}