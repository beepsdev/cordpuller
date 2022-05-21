<?php

namespace Cordpuller;
use Cordpuller\types\Channel;
use Cordpuller\types\User;
use GuzzleHttp\Client;


class Discord {

    public static $DISCORD_BASE_API_URL = "https://discord.com/api/";
    public static $DISCORD_BASE_API_VERSION = 'v10';
    public static $DISCORD_BASE_API_TIMEOUT = 10;

    private static $client;
    private static $app_public_key;
    private static $app_private_key;
    private static $app_token;

    public function __construct(string $public_key, string $private_key, string $token, bool $recreate_client = false) {

        static::$app_public_key = $public_key;
        static::$app_private_key = $private_key;
        static::$app_token = $token;

        if(!static::$client || $recreate_client){
            static::$client = new Client(array(
                'base_uri' => static::$DISCORD_BASE_API_URL . '/' . static::$DISCORD_BASE_API_VERSION . '/',
                'timeout' =>  static::$DISCORD_BASE_API_TIMEOUT,
                'defaults' => array(
                    'headers' => array(
                        'User-Agent' => 'Cordpuller/1.0',
                        'Accept' => 'Application/json',
                        'Authorization' => 'Bot ' . static::$app_token
                    )
                )
            ));
        }

    }

    public function getUser(string $id): User {

        $res = static::$client->request('GET', User::$ENDPOINT . '/' . $id);
        return User::createfromResponse(json_decode($res->getBody()));

    }

    public function getChannel(string $id, string $server_id): Channel {

    }

    public function getServer(string $id){

    }



}