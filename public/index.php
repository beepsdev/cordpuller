<?php

require('../vendor/autoload.php');

use Cordpuller\Discord;
use Cordpuller\Helpers\UtilMethods;
use Cordpuller\Structs\User;

// setting error logging to be active
ini_set("log_errors", TRUE);
ini_set('error_log', "../logs/php_errors.log");

UtilMethods::log('test index');


echo "<h1>Test</h1>";

// Create instance
$config = include('../.env.sl.php');
$discord = new Discord($config['APPLICATION_ID'], $config['TOKEN']);

$user = User::fetch("71167334798065664");
echo $user;