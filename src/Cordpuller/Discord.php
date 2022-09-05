<?php

namespace Cordpuller;

use Exception;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class Discord
{

    private static Discord $instance;

    public static string $DISCORD_BASE_API_URL = "https://discord.com/api";
    public static string $DISCORD_BASE_API_VERSION = 'v10';
    public static int $DISCORD_BASE_API_TIMEOUT = 10;

    private string $app_id;
    private string $app_token;
    private Client $client;

    public function __construct(string $application_id, string $token)
    {

        $this->app_id = $application_id;
        $this->app_token = $token;
        static::$instance = $this;

        $this->createClient();

    }

    private function createClient()
    {
        $this->client = new Client(array(
            'base_uri' => static::$DISCORD_BASE_API_URL . '/' . static::$DISCORD_BASE_API_VERSION . '/',
            'timeout' => static::$DISCORD_BASE_API_TIMEOUT,
            'headers' => array(
                'User-Agent' => 'Cordpuller/1.0',
                'Accept' => 'Application/json',
                'Content-Type' => 'application/json',
                'Authorization' => 'Bot ' . $this->app_token
            )
        ));
    }

    public static function getInstance(): Discord
    {
        return static::$instance;
    }

    /**
     * @throws GuzzleException
     */
    public function ApiRequest(string $method, string $endpoint, array $query = array(), ?string $body = null)
    {
        try {
            $res = $this->client->request($method, $endpoint, array(
                'query' => $query,
                'body' => $body
            ));
            return json_decode($res->getBody(), true);
        } catch (Exception $ex) {
            throw $ex;
        }
    }

}