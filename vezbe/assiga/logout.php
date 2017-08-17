<?php include("config/config.php");?>
<?php 
	include("lib/session.php");					
	Session::checkLogin();              	//  static metoda checkLogin() klase Session           
?> 
<?php
	Session::logout();    // logout metoda klase session (lib/session.php)
?>