<!DOCTYPE html>
<html>

<head>

	<meta charset="utf-8">
	<title>KALKULATOR</title>
	<meta name="author" content="Miloš Pantelinac">
	<link href="/calc/style.css" rel="stylesheet" type="text/css">
	

</head>

<body>
	

<div>

<h1>KALKULATOR</h1>

	
	<form action="kalkulator.php" method="POST">

		<table id="table">
			




		<tr>

		 
			<td><label for="broj1" class="label">Unesite broj1: </label></td>
				<td><input type="number" name="broj1" id="broj1" placeholder="No_Floor_Nomber" maxlength="4" autocomplete="off"></td>
			

		</tr>





		<tr>
		 
			<td><label for="broj2" class="label">Unesite broj2: </label></td>
			<td><input type="number" name="broj2" id="broj2" placeholder="No_Floor_Nomber" maxlength="4" autocomplete="off"></td>
			
		</tr>






		<tr>
				
				   <td colspan="2">

				    <label for="+">+</label>
						<input type="radio" name="op" id="+" value="sab">
					<label for="-">-</label>
						<input type="radio" name="op" id="-" value="odu">
					<label for="*">*</label>
						<input type="radio" name="op" id="*" value="mno">
					<label for="/">/</label>
						<input type="radio" name="op" id="/" value="delj">

					</td>
					
		</tr>






		<tr>
			<td><input type="submit" name="izracunaj" value="IZRAČUNAJ"></td>
			<td id="rezult"><?php include "calc.php" ?></td>
		</tr>


	

	

		</table>

</form>


</div>

</body>
</html>