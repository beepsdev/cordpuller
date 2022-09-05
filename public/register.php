<?php

use Cordpuller_old\Discord;
use Cordpuller_old\libs\builder\CommandBuilder;
use Cordpuller_old\libs\fieldmaps\ApplicationCommandTypes;

require('../vendor/autoload.php');

// Create instance
$config = include('../.env.sl.php');
$discord = new Discord($config['APPLICATION_ID'], $config['PUBLIC_KEY'], $config['PRIVATE_KEY'], $config['TOKEN']);

$app = $discord->getCurrentApplication();
echo '<h1>' . $app->getName() . ' <img src="' . $app->getIconURL() . '" style="width: 25px; border-radius: 100%"/></h1><br>';

$link_app_command = new CommandBuilder();
$link_app_command
    ->setType(ApplicationCommandTypes::MESSAGE)
    ->setName("Get Direct Link")
    ->addLocalizedName("nl", "Directe Link ophalen");
    //->setDescription("Sends a message with a direct link to the user")
    //->addLocalizedDescription("nl", "Stuur een bericht met een directe steam-link");

$discord->registerCommand($link_app_command);