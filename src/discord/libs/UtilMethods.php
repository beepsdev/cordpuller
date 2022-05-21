<?php

namespace Cordpuller\libs;

class UtilMethods {

    public static function dashToCamel(string $input){
        $str = str_replace(' ', '', ucwords(str_replace('-', ' ', $input)));
        $str[0] = strtolower($str[0]);
        return $str;
    }

}