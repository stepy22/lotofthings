<?php
$host="localhost";
$socket=fsockopen($host,80);
fputs($socket,"GET /vezbe/webs/server.php HTTP/1.1\r\n");
fputs($socket,"Host:{$host}\r\n");
fputs($socket,"Connection: close\r\n\r\n");

while(!feof($socket)){
    echo fgets($socket);
}




fclose($socket);

