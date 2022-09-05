<?php

namespace Cordpuller\Libraries\Caches;

class RedisCache {

    protected Redis $con;

    public function __construct()
    {
        $redis = new Redis([
            'host' => '127.0.0.1',
            'port' => 6379,
            'connectTimeout' => 2.5,
            'auth' => ['phpredis', 'phpredis'],
            'ssl' => ['verify_peer' => false],
            'backoff' => [
                'algorithm' => Redis::BACKOFF_ALGORITHM_DECORRELATED_JITTER,
                'base' => 500,
                'cap' => 750,
            ],
        ]);
    }

}