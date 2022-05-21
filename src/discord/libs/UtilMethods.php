<?php

namespace Cordpuller\libs;

class UtilMethods {

    public static function dashToCamel(string $input){
        return str_replace(' ', '', ucwords(str_replace('_', ' ', $input)));
    }

}