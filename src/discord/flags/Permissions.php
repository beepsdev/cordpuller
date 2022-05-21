<?php

namespace Cordpuller\flags;

use Cordpuller\libs\Bitfield;

Class Permissions extends Bitfield {

    static $FLAGS = array(
        "STAFF" => 1<<0,
    );

}