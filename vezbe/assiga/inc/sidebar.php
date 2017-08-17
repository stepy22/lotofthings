		<div class="sidebar clear">
			<div class="samesidebar clear">
				<h2>Kategorije</h2>
					<ul>
				<?php 
					$query = "SELECT * FROM tbl_category";
					$category = $db->select($query);
					if($category){
						while ($result = $category->fetch_object()) {		
				?>
						<li><a href="posts.php?category=<?php echo $result->id; ?>"><?php echo $result->name; ?></a></li>
                <?php } }else{?>
                		<li>No Category Created</li>
                	<?php } ?>  					
					</ul>
			</div>			
			<div class="samesidebar clear">
				<h2>Najnoviji postovi</h2>
				<?php 
					$query = "SELECT * FROM tbl_post ORDER BY id DESC LIMIT 4";
					$post = $db->select($query);
						if($post){
							while ($result = $post->fetch_object()) {//koristim fetch_object()
				?>
					<div class="popular clear">
						<h3><a href="post.php?id=<?php echo $result->id; ?>"><?php echo $result->title; ?></a></h3>
						<p>Objavljeno: <strong><?php echo $fm->formatDate($result->date);?></strong></p>
						<a href="post.php?id=<?php echo $result->id; ?>"><img src="admin/<?php echo $result->image; ?>" alt="post image"/></a>
						<?php echo $fm->readMoreShort($result->body,150); ?><br>							
					</div>
				<?php }} else{header("Location: 404.php");}?>	
			</div>			
		</div>