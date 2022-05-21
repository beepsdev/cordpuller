<?php

use Cordpuller\Discord;

require('../vendor/autoload.php');

echo "<h1>Test</h1>";

// Create instance
$config = include('../.env.php');
$discord = new Discord($config['APPLICATION_ID'], $config['PUBLIC_KEY'], $config['PRIVATE_KEY'], $config['TOKEN']);

$guild = $discord->getGuild('543661757974183960');
echo '- Server Name: ' . $guild->getName() . '<br>';
echo '- Server Type: ' . $guild::class . '<br>';
echo '- Server Icon: <img src="' . $guild->getIconURL() . '" style="width: 50px; border-radius: 100%"/><br><br>';

$channel = $discord->getChannel('543661757974183966');
echo '- Channel Name: #' . $channel->getName() . '<br>';
echo '- Channel Type: ' . $channel::class . '<br>';
echo '- Channel Topic: ' . $channel->getTopic() . '<br><br>';

$user = $discord->getUser('71167334798065664');
echo '- User Name: ' . $user->getUsername() . '<br>';
echo '- User Avatar: <img src="' . $user->getAvatarURL() . '" style="width: 50px; border-radius: 100%"/><br>';
echo '- User Type: ' . $user::class . '<br><br>';

$app = $discord->getCurrentApplication();
echo '- Application Name: ' . $app->getName() . '<br>';
echo '- Application Icon: <img src="' . $app->getIconURL() . '" style="width: 50px; border-radius: 100%"/><br>';
echo '- Application Owner: <br>';
var_dump($app->getOwner());
echo '- Application Guild: <br>';
var_dump($app->getGuild());