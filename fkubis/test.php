<?php

use TeamSpeak3\TeamSpeak3;
use TeamSpeak3\Helper\Signal;

include_once(__DIR__ . "/vendor/autoload.php");

$server = TeamSpeak3::factory("serverquery://serveradmin:15t9u54i@127.0.0.1:10011/?server_port=9987&blocking=0");

Signal::getInstance()->subscribe("serverqueryWaitTimeout", "onWaitTimeout");

$server->getAdapter()->wait();

function onWaitTimeout($time, AbstractAdapter $adapter)
{
    echo "Timeout fired!";
    var_dump($time, $adapter);
}
