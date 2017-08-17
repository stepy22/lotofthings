<?php include("config/config.php");?>
<?php include("lib/Database.php");?>
<?php include("helpers/Format.php");?>
<?php
	$db = new Database();            				// database instanca     (lib/Database.php)
	$fm = new Format()               				// Format(date) instanca (helpers/Format.php)                    
?>
<!DOCTYPE html>
<head>
<meta charset="utf-8">
<title>Register</title>
    <link rel="stylesheet" type="text/css" href="admin/css/stylelogin.css" media="screen" />
</head>
<body>
<div class="container">
	<section id="content">
		<form action="" method="POST">
			<h1>Register</h1>
							<?php 
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {

			$username = $fm->validation($_POST['username']); //validacija username-a i password-a
			$password = $fm->validation(md5($_POST['password']));
			$email    = $fm->validation($_POST['email']);
			$email    = filter_var($email, FILTER_SANITIZE_EMAIL);
			$user_role= 3; 

			$username = mysqli_real_escape_string($db->link, $username);
			$password = mysqli_real_escape_string($db->link, $password);
			$email    = mysqli_real_escape_string($db->link, $email);

			$query    = "INSERT INTO tbl_user (username, password, email, role) VALUES ('$username', '$password', '$email', '$user_role')";                                        // upit ka bazi
			$user     = $db->insert($query);
			if ($user) {
				echo "<span style='color: green; font-size:18px;'>Uspešno ste se registrovali.</span>";
			}else{
				echo "Greška pri registraciji. Pokkušajte kasnije.";
			}	
		}// kraj prvog if-a
			
	?>		
			<div>
				<input type="text" placeholder="Username" required="" name="username"/>
			</div>
			<div>
				<input type="password" placeholder="Password" required="" name="password"/>
			</div>
			<div>
				<input type="text" placeholder="Email address" required="" name="email">
			</div>
			
			<div style="text-align: center;">
				<input type="submit" value="Register" />
			</div>
		</form><!-- form -->
		<div class="button">
			<a href="index.php">Back to Homepage</a>
		</div><!-- button -->
		<div class="button">
			
		</div>
	</section><!-- content -->
</div><!-- container -->
</body>
</html>