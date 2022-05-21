<?php

namespace Cordpuller;
use Cordpuller\interactions\ApplicationCommandAutocomplete;
use Cordpuller\interactions\ApplicationCommandInteraction;
use Cordpuller\interactions\Interaction;
use Cordpuller\interactions\MessageComponent;
use Cordpuller\interactions\ModalSubmit;
use Cordpuller\libs\builder\CommandBuilder;
use Cordpuller\libs\errors\InteractionVerificationFailed;
use Cordpuller\libs\fieldmaps\InteractionResponseTypes;
use Cordpuller\libs\fieldmaps\InteractionTypes;
use Cordpuller\libs\UtilMethods;
use Cordpuller\types\Application;
use Cordpuller\types\channels\Channel;
use Cordpuller\types\channels\TextChannel;
use Cordpuller\types\Guild;
use Cordpuller\types\Message;
use Cordpuller\types\User;
use GuzzleHttp\Client;


class Discord {

    public static $DISCORD_BASE_API_URL = "https://discord.com/api";
    public static $DISCORD_BASE_API_VERSION = 'v10';
    public static $DISCORD_BASE_API_TIMEOUT = 10;

    private static $client;
    private static $app_id;
    private static $app_public_key;
    private static $app_private_key;
    private static $app_token;

    public function __construct(string $application_id, string $public_key, string $private_key, string $token, bool $recreate_client = false) {

        static::$app_id = $application_id;
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
                    'Content-Type' => 'application/json',
                    'Authorization' => 'Bot ' . static::$app_token
                )
            ));
        }

    }

    public function parseRequestAsInteraction(): Interaction|ApplicationCommandAutocomplete|ApplicationCommandInteraction|MessageComponent|ModalSubmit {

        header("Content-Type: application/json");

        $sig    = $_SERVER['HTTP_X_SIGNATURE_ED25519'] ?? null;
        $sig_ts = $_SERVER['HTTP_X_SIGNATURE_TIMESTAMP'] ?? null;
        $body   = file_get_contents('php://input');

        if($sig == null || $sig_ts == null){
            throw new InteractionVerificationFailed();
        }

        $verified = UtilMethods::verifyKey($body, $sig, $sig_ts, static::$app_public_key);
        if($verified === false){
            throw new InteractionVerificationFailed();
        }

        $json = json_decode($body, true);

        $obj = Interaction::Build($json);
        $obj->createFromResponse($this, $json['data'], $obj);

        // Exit early to handle pings
        if($json['type'] === InteractionTypes::PING){
            http_response_code(200);
            die(json_encode(array(
                'type' => InteractionResponseTypes::PONG
            )));
        }

        return $obj;

    }

    private function makeRequest(string $method, string $endpoint, array $query = array(), ?string $body = null): ?array{
        try{
            $res = static::$client->request($method, $endpoint, array(
                'query' => $query,
                'body' => $body
            ));
            return json_decode($res->getBody(), true);
        } catch(\GuzzleHttp\Exception\RequestException $ex){
            var_dump($ex);
            throw $ex;
        }
    }

    public function registerCommand(CommandBuilder $command): ?array
    {
        return $this->makeRequest('POST', 'applications/' . static::$app_id . '/commands', array(), json_encode($command));
    }

    public function sendMessage(string|Channel $channel, string $message, ?EmbedBuilder $embed): ?array
    {

        if($channel instanceof Channel){
            $channel = $channel->getId();
        }

        $data = json_encode(array(
            "content"=> $message,
            "embeds"=> array($embed)
        ));

        return $this->makeRequest('POST', Channel::$ENDPOINT . '/' . $channel . '/' . Message::$ENDPOINT, array(), $data);

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