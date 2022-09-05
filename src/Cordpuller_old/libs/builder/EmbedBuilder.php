<?php

namespace Cordpuller_old\libs\builder;

use Exception;
use JsonSerializable;

class EmbedBuilder implements JsonSerializable {

    public function jsonSerialize(){
        return array(
            "title"=>"test",
            "description"=>"test 2",
        );
    }

}