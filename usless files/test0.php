<?php
$ip=$_SERVER['REMOTE_ADDR'];
$host=$_SERVER['REMOTE_HOST'];
$user=$_SERVER['REMOTE_USER'];
$useragent=$_SERVER['HTTP_USER_AGENT'];
$port=$_SERVER['REMOTE_PORT'];
$url=$ip.':'.$port;
echo "$url <br/> $host <br/> $user <br/> $useragent";
?>
