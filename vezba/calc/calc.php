<?php
	
		

if (isset($_POST["izracunaj"])) {

	$broj3=0;
	$prazan_operator="";
	$greska1="Unesite brojeve!";
	$greska2="Štiklirajte operator!";
	$broj1=$_POST["broj1"];
	$broj2=$_POST["broj2"];
	$operator=$_POST["op"]??$prazan_operator;
   
	



		
	 if (empty($broj1) || empty($broj2)) {
			echo $greska1;
		

		}elseif (empty($operator)){
			echo $greska2;


		}elseif ($operator=="sab") {
			$broj3=$broj1+$broj2;
				echo "$broj1 + $broj2 = ".$broj3;

	

		}elseif ($operator=="odu") {
			$broj3=$broj1-$broj2;
				echo "$broj1 - $broj2 = ".$broj3;
	


		}elseif ($operator=="mno") {
			$broj3=$broj1*$broj2;
				echo "$broj1 * $broj2 = ".$broj3;
	


		}elseif ($operator=="delj") {
			$broj3=$broj1/$broj2;
				echo "$broj1 / $broj2 = ".number_format($broj3,2);
	
}

}

?>

