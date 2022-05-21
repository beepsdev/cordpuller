<?php

namespace Cordpuller\types;

use Cordpuller\Discord;
use Cordpuller\libs\Cache;
use Cordpuller\libs\UtilMethods;

Class Base {

    static ?Discord $client = null;
    static ?Cache $cache = null;

    protected bool $cached_result = false;
    protected $id = null;
    static $ENDPOINT = null;

    public function __construct(){
        if(static::$cache == null){
            static::$cache = new Cache();
        }
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId( ?string $id): static
    {
        $this->id = $id;
        return $this;
    }

    public function isCached(): bool
    {
        return $this->cached_result;
    }

    public function setCached(): void
    {
       $this->cached_result = true;
    }

    public static function createFromResponse( Discord $client, Array $json, Base|null $obj = null): static
    {

        static::$client = $client;

        if($obj == null){
            $obj = new static();
        }

        foreach ($json as $key => $value){
            $key = UtilMethods::dashToCamel($key);
            $setter = "Set$key";
            if(method_exists($obj, $setter)){
                $obj->{$setter}($value);
            }
        }

        static::$cache->add($obj->getid(), $obj);
        return $obj;

    }

}