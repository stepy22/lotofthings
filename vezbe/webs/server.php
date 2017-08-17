<?php

function checkmethod(){
$method=strtolower($_SERVER['REQUEST_METHOD']);
switch($method){
    case "get":
        return 1;
        break;
    case "post":
        return 1;
        break;
    case "put":
        return 1;
        break;
    case "delete":
        return 1;
        break;
}
    }