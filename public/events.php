<?php

require('../vendor/autoload.php');

use Cordpuller\Discord;
use Cordpuller\Helpers\Event;
use Cordpuller\Helpers\UtilMethods;
use Cordpuller\Structs\Gateway\EventGroups\GuildEvent;
use Cordpuller\Structs\Gateway\MessageCreate;
use Cordpuller\Structs\Gateway\TypingStart;

// setting error logging to be active
ini_set("log_errors", TRUE);
ini_set('error_log', "../logs/php_errors.log");

echo "<h1>Test</h1>";

$config = include('../.env.sl.php');
if(
    !isset($_SERVER['HTTP_AUTHORIZATION'])
    || $_SERVER['HTTP_AUTHORIZATION'] !== $config['EVENTS_AUTH']
){
    die('no');
}

// Create instance
$discord = new Discord($config['APPLICATION_ID'], $config['TOKEN']);

$json = file_get_contents('php://input');
$data = json_decode($json, true);

UtilMethods::log('Received ' . count($data) . ' events');

if(json_last_error()){
    die('no2');
}

foreach($data as $raw_event){

    UtilMethods::log('Processing event: ' . json_encode($raw_event['event']) . ' --- ' . json_encode($raw_event));

    /** @var TypingStart $event */
    $event = Event::parseEvent($raw_event['event'], $raw_event['data'] ?? array());

    UtilMethods::log('Event resulted in model: ' . ($event == null ? 'NULL' : get_class($event)));

    if($event instanceof TypingStart){
        UtilMethods::log('Event User Name: ' . $event->getUser());
    }
    if($event instanceof GuildEvent){
        UtilMethods::log('Event User Name: ' . $event->getGuild());
    }

}
