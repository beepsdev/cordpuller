<?php

namespace Cordpuller;
use Cordpuller\types\Application;
use Cordpuller\types\Channel;
use Cordpuller\types\Guild;
use Cordpuller\types\User;
use GuzzleHttp\Client;


class Discord {

    public static $DISCORD_BASE_API_URL = "https://discord.com/api";
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
                'headers' => array(
                    'User-Agent' => 'Cordpuller/1.0',
                    'Accept' => 'Application/json',
                    'Authorization' => 'Bot ' . static::$app_token
                )
            ));
        }

    }

    private function makeRequest(string $method, string $endpoint, array $query = array()): ?array{
        try{
            $res = static::$client->request($method, $endpoint, array(
                'query' => $query
            ));
            return json_decode($res->getBody(), true);
        } catch(\GuzzleHttp\Exception\RequestException $ex){
            throw $ex;
        }
    }

    public function getApplication(string $id): Application {
        if(Application::$cache != null && Application::$cache->has($id)){
            return Application::$cache->get($id);
        }
        return Application::createfromResponse($this, $this->makeRequest('GET', Application::$ENDPOINT . '/' . $id));
    }
    public function getCurrentApplication(): Application {
        return Application::createfromResponse($this, $this->makeRequest('GET', 'oauth2/' . Application::$ENDPOINT . '/' . '@me'));
    }

    public function getUser(string $id): User {
        if(Guild::$cache != null && User::$cache->has($id)){
            return User::$cache->get($id);
        }
        return User::createfromResponse($this, $this->makeRequest('GET', User::$ENDPOINT . '/' . $id));
    }

    public function getCurrentUser(): User {
        return $this->getUser('@me');
    }

    public function getChannel(string $id): Channel {
        if(Channel::$cache != null && Channel::$cache->has($id)){
            return Channel::$cache->get($id);
        }
        return Channel::createfromResponse($this, $this->makeRequest('GET', Channel::$ENDPOINT . '/' . $id));
    }

    public function getGuild(string $id, bool $counts = false): Guild {

        $query = array();

        if($counts){
            $query['with_counts'] = true;
        }else{
            if(Guild::$cache != null && Guild::$cache->has($id)){
                return Guild::$cache->get($id);
            }
        }

        return Guild::createfromResponse($this, $this->makeRequest('GET', Guild::$ENDPOINT . '/' . $id, $query));
    }



}