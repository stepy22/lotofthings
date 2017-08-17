<?php  
	if (isset($_POST["login"])) {
		$user_and_user=array('Marko'=>'123','Milos'=>'321','Jelena'=>'444');
		$greska3="Molim Vas unesite validan User name i password!";
		$greska4="Molim Vas popunite prazna polja";
		
		$user=$_POST["user"];
		$pass=$_POST["pass"];


		if (empty($user) && empty($pass)) {
			echo include "index.php",'<p style="color:red; font-size:25px; text-align:center;">'.$greska4.'</p>';

}else{
		if($user_and_user[$user]==$pass) require "kalkulator.php";
		else echo include "index.php",'<p style="color:red; font-size:25px; text-align:center;">'.$greska3.'</p>';
					}
						}
	?>