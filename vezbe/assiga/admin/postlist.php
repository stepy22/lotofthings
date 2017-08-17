<?php include("inc/header.php"); ?>
</head>
<body>
    <div class="container_12">
<?php include("inc/navigation.php"); ?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Lista Postova</h2>
                <div class="block">  
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th width="5%">NO.</th>
							<th width="15%">Naslov</th>
							<th width="30%">Sadržaj</th>
							<th width="5%">Kategorija</th>
							<th width="10%">Slika</th>
							<th width="10%">Autor</th>
							<th width="5%">Tags</th>
							<th width="10%">Datum objave</th>
							<th width="10%"></th>
						</tr>
					</thead>
					<tbody>

					<?php 
						$query = "SELECT tbl_post.*, tbl_category.name FROM tbl_post INNER JOIN tbl_category ON tbl_post.cat = tbl_category.id ORDER BY tbl_post.title DESC";

						$post  = $db->select($query);
						if ($post) {
							$i = 0;
							while($result = $post->fetch_object()){
								$i++;
					?>
						<tr class="odd gradeX">
							<td><?php echo $i.'.'; ?></td>
							<td><?php echo $result->title; ?></td>
							<td><?php echo $fm->readMoreShort($result->body, 50); ?></td><!--Format klasa/helpers -->
							<td><?php echo $result->name; ?></td>
							<td><img src="<?php echo $result->image;?>" alt="" height="50" width="80px;"></td>
							<td><?php echo $result->author; ?></td>
							<td><?php echo $result->tags; ?></td>
							<td><?php echo $fm->formatDate($result->date); ?></td> <!--Format klasa/helpers -->
							<td>
								<a href="viuwpost.php?viuwpostid=<?php echo $result->id; ?>">Viuw</a> 
					<?php  //  ovaj deo je vidljiv samo za admin-a i autora posta
    					if(Session::get('userId') == $result->userid || Session::get('userRole') == '0'){?>

        				|| <a href="editpost.php?editpostid=<?php echo $result->id; ?>">Edit</a> || 
							<a href="deletepost.php?delpostid=<?php echo $result->id; ?>" style="color:red" onClick="return confirm('Do you really want to delete this post?')">Delete</a>

    				<?php } ?>						
							</td>
						</tr>
					<?php }} ?> <!-- Kraj while petlje i if-a -->
					</tbody>
				</table>
	
               </div>
            </div>
        </div>
        <div class="clear">
        </div>
    </div>
<?php include("inc/footer.php"); ?>
	<script type="text/javascript">
        $(document).ready(function () {
            setupLeftMenu();
            $('.datatable').dataTable();
			setSidebarHeight();
        });
    </script>