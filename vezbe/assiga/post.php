<?php include("inc/header.php");?>
<?php 
	if (!isset($_GET['id']) || $_GET['id'] == NULL) {  // proveravam da li postoji GET parametar u url-u od post-a
		header("Location: 404.php");
	}else{
		$id = $_GET['id'];
	}
?>
<?php 
	$msg = "";
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    	$author   = $_POST['username'];
    	$content  = $_POST['content'];

        $username = mysqli_real_escape_string($db->link, $author);
        $content  = mysqli_real_escape_string($db->link, $content);

        if ($username == "" || $content == "") {
            $msg =  "<span stile='color:green;'>Morate popuniti sva polja!</span>";

        }else{
        	$query = "INSERT INTO tbl_comments(comment_post_id, author, content) VALUES('$id', '$username', '$content')";
        	$comm  = $db->insert($query);
        	if ($comm) {
                    $msg = "<span stile='color:green;'>Komentar je uspešno dodat.</span>";

                }else {
                    $msg = "<span stile='color:red;'>Komentar nije dodat, pokušajte kasnije.!</span>";
                }  
        }// kraj else-a
    } // kraj if-a
?>
	<div class="contentsection contemplete clear">
		<div class="maincontent clear">
			<div class="about">
				<?php 
					$query = "SELECT * FROM tbl_post WHERE id = '$id'";      //upit ka bazi
					$post  = $db->select($query);                          
					if ($post) {
						while ($result = $post->fetch_object()) {              // fetch_object rezultata iz baze
				?>
					<h2><?php echo $result->title; ?></h2>
					<h4><?php echo $fm->formatDate($result->date); ?></h4>
					<img src="admin/<?php echo $result->image; ?>" alt="MyImage"/>
				<?php echo $result->body; ?><hr>				
				<?php 
					if(empty($username)){
						echo "<h3>Komentari:</h3><p>Morate biti ulogovani na sajt kako bi mogli da ostavite komentar.</p><hr>";
					}else{
						echo "<h3>Dodaj komentar:</h3>";
						echo $msg;

						echo "<form action='' method='POST'>";
						echo "<label for='username'>Autor:</label><br>";
						echo "<input type='text' name='username' id='username' value='$username'>";
					    echo "<textarea name='content' cols='30' rows='10' placeholder='Unesite komentar...'></textarea><br>";
					    echo"<input type='submit' value='Dodaj komentar'><br>";				
						echo"</form><br>";
				        echo"<h3>Komentari:</h3><hr>";
				}?>
				<?php 
					$query   = "SELECT * FROM tbl_comments WHERE comment_post_id = '$id'";					
					$comment = $db->select($query);
					if($comment){
						while($comment_result = $comment->fetch_object()){					
				?>
						<h4>
							<?php echo $fm->formatDate($comment_result->date); ?>, <br>By: 
							<?php echo $comment_result->author; ?>
							<img src="images/avatar.png" alt="avatar" style="width: 20px; height: 20px;">
						</h4>
				<?php 
				?>
						<p>Komentar: <?php echo $comment_result->content; ?><br>
							<?php if ($comment_result->author === $username){
								echo "<a onClick='return confirm('Do you really want to delete this post?');' href='delcom.php?comid=$comment_result->comment_id' style='color:red'>Delete</a>";
							}?>
							
						</p><hr>
					<?php }} ?>
				<div class="relatedpost clear">
					<h2>Related articles</h2>
						<?php              //////////// podseti se na php.net RAND() kasnijeeeeeeeee!!!!
							$catid = $result->cat;
							$query_related = "SELECT * FROM tbl_post WHERE cat='$catid' ORDER BY RAND()LIMIT 6";
							$related_post = $db->select($query_related);

							if($related_post){
								while ($related_result = $related_post->fetch_object()) {//koristim fetch_objecct()
						?>		                           
							<a href="post.php?id=<?php echo $related_result->id; ?>">
								<img src="admin/<?php echo $related_result->image; ?>" alt="post image"/>
							</a>
						<?php 
						} ///////////             kraj while druge while petlje 
							}else{ echo "No Related Post Availabele";};
						?>
				</div>
						<?php

						} //     kraj gornje while petlje
						}else{
							header("Location:404.php");
						} ?>   <!--               kraj if-a                 -->
			</div>
		</div>
<?php include("inc/sidebar.php");?>
<?php include("inc/footer.php");?>