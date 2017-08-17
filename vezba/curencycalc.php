<html>
<head> <title>prevodjenje valuta</title>
<h3>Odaberi stranu valutu i onda napisi iznos u istoj</h3>
<body>
<form action='curencycalc.php' method='POST'>
<input type= 'text' name='iznos'/>
<select name='valuta'>
<option value='125'>Evro</option>
<option value='105'>Dolar</option>
<option value='95'>franak</option>
</select>
<input type="submit" value="Konvertuj" name="submit" />

</form>
</body>

</html>


<?php
if(isset($_POST['submit'])){
  $iznos=$_POST['iznos'];
  $valuta = $_POST['valuta'];
  echo "iznos u dinarima: " . $iznos * $valuta;
  
}
?>
