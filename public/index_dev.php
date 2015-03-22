<?php

error_reporting(-1);
ini_set("display_errors",1);

require_once('../vendor/autoload.php');

$bootstrap = new \Mpwarfw\Component\Bootstrap();

$session   = new \Mpwarfw\Component\Session\Session();
$request   = new \Mpwarfw\Component\Request\Request($session);
$response  = $bootstrap->execute($request);
$response->send();

echo "<div style='position: absolute; bottom: 0; height: 50px; width: 100%; background: #ccc; border-top: 1px solid #aaa; color: white; text-align: center; line-height: 50px;'>Debugger</div>";