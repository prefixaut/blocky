<?php

require('vendor/autoload.php');
require('Blocky.php');

$blocky = new Blocky();
$twitch = new Kamui\API($blocky->getTwitchToken());
