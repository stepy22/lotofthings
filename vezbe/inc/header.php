<?php include("config/config.php");?>
<?php include("lib/Database.php");?>
<?php include("helpers/Format.php");?>
<?php include("lib/session.php");?>
<?php  
	$s       = new Session();                 // otvaram sesiju init metodom klase Session
	$session = $s->init();

	
	// if($session){
	// 	Session::set("login", true);   // Pokrecem sesiju ako je korisnik pronadjen u bazi, set() metodom i postavljam je kao true
	// 				Session::set("username", $value['username']);
	// 				Session::set("userId", $value['id']);
	// 				Session::set("userRole", $value['role']);

		$userid   = Session::get('userId');
		$role     = Session::get('userRole');
		$username = Session::get('username');
?>
<?php
	$db = new Database();            	  // database instanca     (lib/Database.php)
	$fm = new Format();              	 // Format(date) instanca (helpers/Format.php)     
										// TITLE je konstanta u config fajlu,              
?>				
<!DOCTYPE html>
<html>
<head>
<?php 
	if (isset($_GET['pageid'])) {

		$pagetitleid = $_GET['pageid'];                              // kupim get parametar strane
		$query = "SELECT * FROM tbl_page WHERE id = $pagetitleid";  // vatim title iz baze po get param
		$title = $db->select($query);
		if($title){
			while($result = $title->fetch_object()){ ?>
			<title><?php echo $result->name; ?> - <?php echo TITLE; ?></title>
<?php }}} elseif (isset($_GET['id'])) {              // kupim id od posta iz get parametra 
			$postid = $_GET['id'];                              
			$query = "SELECT * FROM tbl_post WHERE id = $postid";  
			$posts = $db->select($query);
				if($posts){
					while($result = $posts->fetch_object()) { ?>
					<title><?php echo $result->title; ?> - <?php echo TITLE; ?></title>
<?php }}} else{ ?>
			<title><?php echo $fm->title(); ?> - <?php echo TITLE; ?></title>
	<?php } ?>	         
	<?php include "scripts/meta.php";?>
	<?php include "scripts/css.php";?>
	<?php include "scripts/js.php";?>
</head>
<body>
	<div class="headersection templete clear">
		<a href="index.php">
			<div class="logo">
			<?php 
			$query = "SELECT * FROM title_slogan where id = '1'";  // query ka bazi 
                $slogan = $db->select($query);
                if($slogan){
                    while ($result = $slogan->fetch_object()) {
			?>
				<img src="admin/<?php echo $result->logo; ?>" alt="Logo"/>
				<h2><?php echo $result->title; ?></h2>
				<p><?php echo $result->slogan; ?></p>
				<p>
					<?php 
						if($username){
							echo "<h4>Dobrodošli: ".$username."</h4>";
						}
					?>
				</p>				
			</div>
			<?php }} ?>
		</a>
		<div class="social clear">
			<div class="icon clear">
			<?php 
				$query = "SELECT * FROM tbl_social WHERE id ='1'";  // query za selecct iz baze 
				$social = $db->select($query);                      // metoda select();
				if($social){
					while($result = $social->fetch_object()){
			?>	
				<a href="<?php echo $result->facebook; ?>" target="_blank"><i class="fa fa-facebook"></i></a>
				<a href="<?php echo $result->twitter; ?>" target="_blank"><i class="fa fa-twitter"></i></a>
				<a href="<?php echo $result->linkedin; ?>" target="_blank"><i class="fa fa-linkedin"></i></a>
				<a href="<?php echo $result->google; ?>" target="_blank"><i class="fa fa-google-plus"></i></a>
			</div>
			<?php }} //kraj while petlje i if-a ?>
			<div class="searchbtn clear">
			<form action="search.php" method="GET">
				<input type="text" name="search" placeholder="Unesi reči za pretragu..."/>
				<input type="submit" name="submit" value="Pretraži"/>
			</form>
			</div>
		</div>
	</div>
	<div class="navsection templete">
	<?php 
		$path = $_SERVER['SCRIPT_FILENAME'];
		$currentpage = basename($path, '.php');   									 // utimam .php if fajla
	?>
		<ul>
			<li><a <?php if($currentpage == 'index'){echo 'id = "active"';}?> href="index.php">Home</a></li>
		<?php 
			$query = "SELECT * FROM tbl_page";
			$page = $db->select($query);
			if($page){
				while ($result = $page->fetch_object()) {
		?>
			<li><a 
<?php 							// pravim active link u navigaciji
	if(isset($_GET['pageid']) && $_GET['pageid'] == $result->id){
		echo 'id = "active"';
	}	
?>
			href="page.php?pageid=<?php echo $result->id; ?>"><?php echo $result->name; ?></a></li>
		<?php }} ?>	
			<li><a <?php if($currentpage == 'contact'){echo 'id = "active"';}?> href="contact.php">Kontakt</a></li>
		<?php 
			if(!$username){
				echo"<li><a href='login.php'>Login</a></li>";				
			}else{

				echo"<li><a href='logout.php'>Logout</a></li>";
				if ($role < 3 ) {
					echo"<li><a href='admin/'>Admin</a></li>";
				}
			}	
		?>
		</ul>
	</div>	