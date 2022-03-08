<?php

require_once "lib/autoload.php";

$logger = new Logger();

$log = $logger->ShowLog();
$log = str_replace('\r\n', "<br>", $log);

print $log;
