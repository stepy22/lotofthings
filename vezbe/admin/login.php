<?php 
	include("../lib/session.php");					
	Session::checkLogin();              	//  static metoda checkLogin() klase Session           
?> 
<?php include("../config/config.php");?>
<?php include("../lib/Database.php");?>
<?php include("../helpers/Format.php");?>
<?php
	$db = new Database();            		// database instanca     (lib/Database.php)
	$fm = new Format()               	// Format(date) instanca (helpers/Format.php)                    
?>
<!DOCTYPE html>
<head>
<meta charset="utf-8">
<title>Login</title>
    <link rel="stylesheet" type="text/css" href="css/stylelogin.css" media="screen" />
</head>
<body>
<div class="container">
	<section id="content">
		<form action="login.php" method="POST">
			<h1>Admin Login</h1>
	<?php 
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {

			$username = $fm->validation($_POST['username']); //validacija username-a i password-a
			$password = $fm->validation(md5($_POST['password']));

			$username = mysqli_real_escape_string($db->link, $username);
			$password = mysqli_real_escape_string($db->link, $password);

			$query = "SELECT * FROM tbl_user WHERE username = '$username' AND password = '$password'";                                        // upit ka bazi
			$result = $db->select($query);

			if ($result != false) {
				$value   = mysqli_fetch_array($result);
				$row     = mysqli_num_rows($result); 

				if ($row > 0) {
					Session::set("login", true);   // Pokrecem sesiju ako je korisnik pronadjen u bazi, set() metodom i postavljam je kao true
					Session::set("username", $value['username']);
					Session::set("userId", $value['id']);
					Session::set("userRole", $value['role']);
					if(Session::get("userRole") > 2){
						header("Location: ../index.php");		   //		redirektujem admin-a u admin-panel
					}else{
						header("Location: index.php");
					}
					
				}else{
					echo "<span style='color:red; font-size: 18px;'>No Result found</span>";
				}// kraj treceg if-a
			}else{
				echo "<span style='color:red; font-size: 18px;'>Username or Password not matched!!</span>";
			}// kraj drugog ifa
		}// kraj prvog if-a
	?>
			<div>
				<input type="text" placeholder="Username" required="" name="username"/>
			</div>
			<div>
				<input type="password" placeholder="Password" required="" name="password"/>
			</div>
			<div>
				<input type="submit" value="Log in" />
			</div>
		</form><!-- form -->
		<div class="button">
			<a href="forgetpass.php">Forgot Password</a>
		</div><!-- button -->
		<div class="button">
			
		</div>
	</section><!-- content -->
</div><!-- container -->
</body>
</html>