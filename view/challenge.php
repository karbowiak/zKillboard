<?php

global $redis, $ip;

$uri = $redis->get("ip::redirect::$ip");
if ($uri == "") $uri = "/";
$redis->del("ip::redirect::$ip");
$redis->setex("ip::challenge_safe::$ip", 3600, "true");
header("Location: $uri");
Log::log("$ip successfully challenged and redirecting to $uri");
