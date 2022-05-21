<?php

use Cordpuller\Discord;

require('./vendor/autoload.php');

// Create instance
$config = include('./.env.php');
$discord = new Discord($config['PUBLIC_KEY'], $config['PRIVATE_KEY'], $config['TOKEN']);

$user = $discord->getuser('71167334798065664');
var_dump($user);