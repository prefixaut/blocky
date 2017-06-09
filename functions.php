<?php

require('Blocky.php');
require('vendor/autoload.php');

$blocky = new Blocky();
$twitch = new Kamui\API($blocky->getTwitchToken());
