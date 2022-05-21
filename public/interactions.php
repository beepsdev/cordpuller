<?php

require('../vendor/autoload.php');
use Cordpuller\Discord;
use Cordpuller\interactions\ApplicationCommandInteraction;
use Cordpuller\libs\errors\DiscordException;
use Cordpuller\libs\fieldmaps\ApplicationCommandTypes;
use Cordpuller\libs\flags\MessageFlags;

ini_set("log_errors", 1);
ini_set("error_log", "/app/logs/php_errors.log");

try{

    // Create instance
    $config = include('../.env.php');
    $discord = new Discord($config['APPLICATION_ID'], $config['PUBLIC_KEY'], $config['PRIVATE_KEY'], $config['TOKEN']);

    $interaction = $discord->interaction();

    if($interaction instanceof ApplicationCommandInteraction){

        if($interaction->getType() == ApplicationCommandTypes::MESSAGE){
            $flags = new MessageFlags("EPHEMERAL");
            $interaction->reply("Test", null, $flags);
        }

    }

}catch(DiscordException $ex){
    http_response_code($ex->getCode());
    die(json_encode(array(
        "error" => array(
            "code" => $ex->getCode(),
            "message" => $ex->getMessage()
        )
    )));
}