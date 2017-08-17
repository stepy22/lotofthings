<?php include("inc/header.php");?>
<?php include("inc/slider.php");?>
<?php
	if (!isset($_GET['search']) || $_GET['search'] == NULL) {  // proveravam da li postoji GET parametar u url-u od pretrage
			header("Location: 404.php");
	}elseif (empty($_GET['search'])) {
		echo "Field is empty";
	}else{
		$search = $_GET['search'];
	}
?>
	<div class="contentsection contemplete clear">
		<div class="maincontent clear">
				<?php 
					$query = "SELECT * FROM tbl_post WHERE title LIKE '%$search%' OR  body LIKE '%$search%' ORDER BY id DESC LIMIT 10";        //upit ka bazi za search
					$post  = $db->select($query);                          
					if ($post) {
						while ($result = $post->fetch_object()) {          // fetch_object rezultata iz baze
				?>
			<div class="samepost clear">
				<h2><a href="post.php?id=<?php echo $result->id; ?>"><?php echo $result->title; ?></a></h2>
				<h4><?php echo $fm->formatDate($result->date); ?>, By: <a href="#"><?php echo $result->author; ?></a></h4>
				 <a href="#"><img src="admin/<?php echo $result->image; ?>" alt="post image"/></a>
					<?php echo $fm->readMoreShort($result->body,200); ?>
				<div class="readmore clear">
					<a href="post.php?id=<?php echo $result->id; ?>">Read More</a>
				</div>
			</div>
<!--   Kraj while petlje i if-a   -->			
<?php }}else{ 
			echo "<p>No Result</p>";
			}?>              
		</div>
<?php include("inc/sidebar.php");?>
<?php include("inc/footer.php");?>