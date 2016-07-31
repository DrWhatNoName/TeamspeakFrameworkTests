<?php

require_once("TeamSpeak3/TeamSpeak3.php");

$server = TeamSpeak3::factory("serverquery://serveradmin:15t9u54i@127.0.0.1:10011/?server_port=9987&blocking=0");

TeamSpeak3_Helper_Signal::getInstance()->subscribe("serverqueryWaitTimeout", "onWaitTimeout");

$server->getAdapter()->wait();

function onWaitTimeout($time, TeamSpeak3_Adapter_ServerQuery $adapter)
{
    echo "Timeout fired!";
    var_dump($time, $adapter);
}