<?php include("inc/header.php"); ?>
</head>
<body>
    <div class="container_12">
<?php include("inc/navigation.php"); ?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Lista kategorija</h2>
	<?php 
		if(isset($_GET['delcat'])){
			$delid = $_GET['delcat'];
			$delquery = "DELETE FROM tbl_category WHERE id = '$delid' LIMIT 1";
			$delcat = $db->delete($delquery);
			if($delcat){
				echo "<span class='success'>Category is deleted successfully</span>";
			}else{
				echo "<span class='error'>Error!! Category is not deleted!</span>";
			}
		}
	?>
                <div class="block"> 
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>ID kategorije:</th>
							<th>Ime kategorije:</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
				<?php 
					$query = "SELECT * FROM tbl_category"; // ili  ORDER BY id DESC ako zelim od zadnje
					$category = $db->select($query);
					if ($category) {
						$i=0;
						while ($result = $category->fetch_object()) {
							$i++;
				?>
						<tr class="odd gradeX">
							<td><?php echo $result->id; ?></td>
							<td><?php echo $result->name; ?></td>
							<td><a href="editcat.php?catid=<?php echo $result->id; ?>">Edit</a> || <a onClick="return confirm('Do you really want to delete this category?')" href="?delcat=<?php echo $result->id; ?>" style="color:red">Delete</a></td>
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