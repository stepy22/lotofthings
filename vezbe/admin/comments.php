<?php include("inc/header.php"); ?>
</head>
<body>
    <div class="container_12">
<?php include("inc/navigation.php"); ?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Lista Komentara:</h2>
	<?php 
		if(isset($_GET['delcomentid'])){
			$delcom = $_GET['delcomentid'];
			$delquery = "DELETE FROM tbl_comments WHERE comment_id = '$delcom' LIMIT 1";

			$delcomment = $db->delete($delquery);
			if($delcomment){
				echo "<span class='success'>Komentar je obrisan.</span>";
			}else{
				echo "<span class='error'>Error!! Komentar nije obrisan!</span>";
			}
		}
	?>
                <div class="block"> 
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th width="10%">Id</th>
							<th width="10%">Post Id</th>
							<th width="20%">Autor:</th>
							<th width="40%">Sadrzaj</th>
							<th width="20%">Datum:</th>
						</tr>
					</thead>
					<tbody>
				<?php 
					$query = "SELECT * FROM tbl_comments"; // ili  ORDER BY id DESC ako zelim od zadnje
					$comment = $db->select($query);
					if ($comment) {
						$i=0;
						while ($result = $comment->fetch_object()) {
							$i++;
				?>
						<tr class="odd gradeX">
							<td><?php echo $result->comment_id; ?></td>
							<td><?php echo $result->comment_post_id; ?></td>
							<td><?php echo $result->author; ?></td>
							<td><?php echo $fm->readMoreShort($result->content, 100); ?></td>
							<td><?php echo $fm->formatDate($result->date); ?></td>
							<td>			
							<?php 
								if(Session::get('userRole') == '0'){?>
									<a onClick="return confirm('Do you really want to delete this comment?')" href="?delcomentid=<?php echo $result->comment_id;?>" style="color:red;">Delete</a>
						<?php }?>
							</td>
						</tr>
				<?php 
						} // kraj while petlje

					}     // kraj if-a
				 ?>		
					</tbody>
				</table>
               </div>
            </div>
        </div>
		<div class="clear">
        </div>
    </div>
<?php include("inc/footer.php") ?>
<script type="text/javascript">
	$(document).ready(function () {
	    setupLeftMenu();
	    $('.datatable').dataTable();
		setSidebarHeight();
    });
</script>