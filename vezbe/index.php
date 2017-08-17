<?php include("inc/header.php");?>
<?php include("inc/slider.php");?>
	<div class="contentsection contemplete clear">
		<div class="maincontent clear">

<!--     Pejdzing    -->
<?php 

	$per_page = 5;
	if (isset($_GET['page'])) {
		$page = $_GET['page'];
	}else{
		$page = 1;	
	}
	$start_form = ($page-1) * $per_page;
?>
<!--     kraj Pejdzing-a    -->

		<?php 
			$query = "SELECT * FROM tbl_post LIMIT $start_form, $per_page";        // upit ka bazi i pagination
			$post = $db->select($query);                      		   //  pozivam metodu select klase Database
			if($post){
				while ($result = $post->fetch_object()) {              // fetch_object
		?>

			<div class="samepost clear">
				<h2><a href="post.php?id=<?php echo $result->id; ?>"><?php echo $result->title; ?></a></h2>
				<h4><?php echo $fm->formatDate($result->date); ?>, By: <a href="#"><?php echo $result->author; ?></a></h4>
				 <a href="#"><img src="admin/<?php echo $result->image; ?>" alt="slika"/></a>

					<?php echo $fm->readMoreShort($result->body,400); ?>

				<div class="readmore clear">
					<a href="post.php?id=<?php echo $result->id; ?>">Read More</a>
				</div>
			</div>

<?php } ?><!--     Kraj while petlje   -->

<!--     Pagination    -->
<?php 
	$query = "SELECT * FROM tbl_post";
	$result = $db->select($query);
	$total_rows = mysqli_num_rows($result);
	$total_pages = ceil($total_rows / $per_page);        // ceil() funkcija zaokruzuje na veci broj

	echo "<span class='pagination'><a href='index.php?page=1'>".'Prva'."</a>";?>
<?php  
	for ($i=1; $i <= $total_pages ; $i++) { 
		echo"<a href='index.php?page=".$i."'>".$i."</a>";
	}
	echo "<a href='index.php?page=".$total_pages."'>".'Zadnja'."</a>"."</span>";?>
<!--     Kraj Pagination-a   -->
<?php }else{ header("Location:404.php");}?>              <!--     Kraj if   -->
		</div>
<?php include("inc/sidebar.php");?>
<?php include("inc/footer.php");?>