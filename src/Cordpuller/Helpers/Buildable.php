<?php

namespace Cordpuller\Helpers;

trait Buildable {

    protected static function build(array $data): static
    {

        $instance = new static();
        $keys = array_keys($data);

        foreach($keys as $key){
            $value = $data[$key];

            $setter_name = UtilMethods::dashToCamel($key);
            $setter_name = "Set$setter_name";
            if(method_exists($instance, $setter_name)){
                $instance->{$setter_name}($value);
            }else{
                $instance->{$key} = $data[$key];
            }

        }

        return $instance;

    }

}