<?php include("inc/header.php");?>
<?php              //////////     VALIDACIJAAAAAA    /////////////////////
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		$firstname = $fm->validation($_POST['firstname']); // validation() metoda klase Format / vidi helpers
		$firstname = mysqli_real_escape_string($db->link, $firstname);
		$lastname  = $fm->validation($_POST['lastname']);
		$lastname  = mysqli_real_escape_string($db->link, $lastname);
		$email     = $fm->validation($_POST['email']);
		$email     = mysqli_real_escape_string($db->link, $email);
		$message   = $fm->validation($_POST['message']);
		$message   = mysqli_real_escape_string($db->link, $message);

		$errorf    = "";
		$errorl    = "";
		$errore    = "";
		$errorm    = "";
	
// moze i ovakva validacija ako zelim da mi se poruke o gresci ispisuju gore, iznad input polja //
		// if (empty($firstname)) {
		// 	$errorf = "Morate uneti Vaše ime!";
		// }
		// if (empty($lastname)) {
		// 	$errorl = "Morate uneti Vaše prezime!";
		// }
		// if (empty($email)) {
		// 	$errore = "Morate uneti Vašu email agresu!";
		// }
		// if (empty($message)) {
		// 	$errorm = "Morate uneti Vašu poruku!";

 

		if (empty($firstname)) {
			$error = "Morate uneti Vaše ime!";
		}elseif (empty($lastname)) {
			$error = "Morate uneti Vaše prezime!";
		}elseif(empty($email)){
			$error = "Morate uneti Vašu email adresu!";
		}elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
			$error = "Neispravna email adresa!";
		}elseif(empty($message)){
			$error = "Ne možete poslati praznu posuku!";
		}else{
			
			$query = "INSERT INTO tbl_contact (firstname, lastname, email, message) VALUES ('$firstname', '$lastname', '$email', '$message')";

			$insert_msq = $db->insert($query);
			if($insert_msq){
				$msg    = "<strong>Poruka je uspešno poslata.</strong>";
			}else{
				$error  = "<strong>Greška!! Poruka nije poslata. Molim Vas pokušajte kasnije, hvala.</strong>";
			}
		}
	}
?>

	<div class="contentsection contemplete clear">
		<div class="maincontent clear">
			<div class="about">
				<h2>Contact us</h2>
				<?php 
					if (isset($error)) {
						echo "<span style='color:red;'>$error</span>";
					}
					if (isset($msg)) {
						echo "<span style='color:green'>$msg</span>";
					}


				?>
			<form action="" method="post">
				<table>
				<tr>
					<td>Your First Name:</td>
					<td>
					<?php 
						// if(isset($errorf)){
						// 	echo "<span style='color:red;'>$errorf</span><br>";
						// } 
					?>
					<input type="text" name="firstname" placeholder="Enter first name"/>
					</td>
				</tr>
				<tr>
					<td>Your Last Name:</td>
					<td>
					<?php 
						// if(isset($errorl)){
						// 	echo "<span style='color:red;'>$errorl</span><br>"; 
						// } 
					?>
					<input type="text" name="lastname" placeholder="Enter Last name"/>
					</td>
				</tr>
				
				<tr>
					<td>Your Email Address:</td>
					<td>
					<?php
// 							if(isset($errorf)){ 
// 							echo "<span style='color:red;'>$errore</span><br>"; 
// 						} 
					?>
					<input type="text" name="email" placeholder="Enter Email Address"/>
					</td>
				</tr>
				<tr>
					<td>Your Message:</td>
					<td>
					<?php 
						// <!-- if(isset($errorf)){
						// 	echo "<span style='color:red;'>$errorm</span><br>"; 
						// }  -->
					?>
					<textarea name="message"></textarea>
					</td>
				</tr>
				<tr>
					<td></td>
					<td>
					<input type="submit" name="submit" value="Send"/>
					</td>
				</tr>
		</table>
	<form>				
 </div>

		</div>
<?php include("inc/sidebar.php");?>
<?php include("inc/footer.php");?>