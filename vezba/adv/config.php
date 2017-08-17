<?php
define("APP_DIR","c:/wamp64/www/adv/");

function __autoload($classname){
	require_once(APP_DIR."classes/{$classname}.class.php");
}