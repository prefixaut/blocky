<?php

require('vendor/autoload.php');
require('includes/Blocky.php');
require('includes/BlockyWalker.php');

$blocky = new Blocky();
$twitch = new Kamui\API($blocky->getTwitchToken());
