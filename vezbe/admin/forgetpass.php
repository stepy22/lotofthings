<?php 
	include("../lib/session.php");					
	Session::checkLogin();              	//  static metoda checkLogin() klase Sesion           
?> 
<?php include("../config/config.php");?>
<?php include("../lib/Database.php");?>
<?php include("../helpers/Format.php");?>
<?php
	$db = new Database();            				// database instanca     (lib/Database.php)
	$fm = new Format()               				// Format(date) instanca (helpers/Format.php)                    
?>
<!DOCTYPE html>
<head>
<meta charset="utf-8">
<title>Password Recovery</title>
    <link rel="stylesheet" type="text/css" href="css/stylelogin.css" media="screen" />
</head>
<body>
<div class="container">
	<section id="content">
		<form action="" method="POST">
			<h1>Recovery</h1>
	<?php 
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {

			$email = $fm->validation($_POST['email']); 								//validacija email-a 
			$email = mysqli_real_escape_string($db->link, $email);

			if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
				echo "<span style = 'color:red; font-size: 18px;'>Invalid email address!</span>";
			}else{
				$mailquery = "SELECT * FROM tbl_user WHERE email = '$email' LIMIT 1";
    			$mailcheck = $db->select($mailquery);
		// ako je mail adresa u bazi, radim reset password-a tako sto saljem mail sa novom šifrom
				if ($mailcheck   != false) {
					while($result = $mailcheck->fetch_object()){
						$userid   = $result->id;
						$username = $result->username;
					}
///////////          reset password-a          //////////////  w3school mail()

					$text        = substr($email, 0, 3);
					$rand        = rand(1000, 99999);
					$newpass     = "$text$rand";
					$password    = md5($newpass);                // query

					$updatequery = "UPDATE tbl_user              
							        SET 
							  		password = '$password'
							  		WHERE id = 'userid'";
					$updated_row = $db->update($updatequery);    // update
	    //  priprema mail-a   //
					$to       = $email;
					$from     = "simke20@yahoo.com";
					$headers  = "FROM: $from\n"; 
					$headers  = "MIME-Version: 1.0" . "\r\n";
					$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
					$subject  = "Your Password";
					$message  = "Your username is: ".$username."and Password is: ".$newpass." Please visit website to Login.";
		///    saljem mail sa aktivacionim kodom    ///
					$sendmail = mail($to, $subject, $message, $headers);
						if ($sendmail) {
							echo "<span style='color:green; font-size: 18px;'>Please, check your email for new password..</span>";
						}else{
							echo "<span style='color:red; font-size: 18px;'>Error. Email was not sent.</span>";
						}
				}else{
					echo "<span style='color:red; font-size: 18px;'>Error! Email Not Exist in database!!</span>";
				}// kraj drugog ifa
			} // kraj else-a
		}// kraj prvog if-a
	?>
			<div>
				<input type="text" placeholder="Enter Valid email adress" required="" name="email"/>
			</div>
			<div>
				<input type="submit" value="Send Mail" />
			</div>
		</form><!-- form -->
		<div class="button">
			<a href="login.php">Back</a>
		</div><!-- button -->
	</section><!-- content -->
</div><!-- container -->
</body>
</html>