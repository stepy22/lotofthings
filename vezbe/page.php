<?php include("inc/header.php");?>
<?php 
	if(!isset($_GET['pageid']) || $_GET['pageid'] == NULL){      // proveravam da li postoji get parametar
		header("Location: 404.php");							  // redirektujem na error stranu
	}else{
		$id = $_GET['pageid'];
	}
?>
	<div class="contentsection contemplete clear">
		<div class="maincontent clear">
			<div class="about">
	<?php 
		$query = "SELECT * FROM tbl_page WHERE id = '$id'";  // vidi gore, get parametar strane
		$page = $db->select($query);
		if($page){
			while($result = $page->fetch_object()){
	?>
				<h2><?php echo $result->name; ?></h2>	
				<p><?php echo $result->body; ?></p>	
		<?php }}else{
				header("Location: 404.php");		// kraj petlje is if-a i redirekcija
			} ?>			
			</div>
		</div>
<?php include("inc/sidebar.php");?>
<?php include("inc/footer.php");?>