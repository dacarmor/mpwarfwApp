<?php

require_once('../vendor/autoload.php');

$bootstrap = new \Mpwarfw\Component\Bootstrap();

$session   = new \Mpwarfw\Component\Session\Session();
$request   = new \Mpwarfw\Component\Request\Request($session);
$response  = $bootstrap->execute($request);
$response->send();