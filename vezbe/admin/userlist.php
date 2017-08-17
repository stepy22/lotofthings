<?php include("inc/header.php"); ?>
</head>
<body>
    <div class="container_12">
<?php include("inc/navigation.php"); ?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>User list:</h2>
        <?php 
        	if(isset($_GET['deluserid'])){              	// brisanje user-a po id-u iz get parametra
        		$deluser   = $_GET['deluserid'];
        		$delqueury = "DELETE FROM tbl_user WHERE id = '$deluser'";
        		$deldata   = $db->delete($delqueury);
        		if($deldata){
        			echo "<span class='success'>User deleted Successfully</span>";
        		}else{
        			echo "<span class='error'>ERROR: User not deleted Successfully</span>";  
        		}
        	} // kraj if-a
        ?>
                <div class="block">  
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th width="5%">NO.</th>
							<th width="10%">Name</th>
							<th width="15%">Username</th>
							<th width="15%">Password</th>
							<th width="15%">Email</th>
							<th width="20%">Details</th>
							<th width="10%">Role</th>
							<th width="10%">Action</th>
						</tr>
					</thead>
					<tbody>
					<?php 
						$query = "SELECT * FROM tbl_user";

						$user  = $db->select($query);
						if ($user) {
							$i = 0;
							while($result = $user->fetch_object()){
							$i++;
					?>
						<tr class="odd gradeX">
							<td><?php echo $i."."; ?></td>
							<td><?php echo $result->name; ?></td>
							<td><?php echo $result->username; ?></td>
							<td><?php echo $result->password; ?></td>
							<td><?php echo $result->email; ?></td>
							<td><?php echo $fm->readMoreShort($result->details, 30); ?></td>
							<td>
								<?php              // ispisujem user role ali ne po brojevima vec po nazivu
									if($result->role == 0 ){
										echo "Admin"; 
									}elseif($result->role == 1){
										echo "Autor";
									}elseif($result->role == 2){
										echo "Editor";
									}else{
										echo "Subscriber";
									}
								?>
							</td>
							<td>
								<a href="viuwuser.php?userid=<?php echo $result->id; ?>">Viuw</a> 
							 	 
						<?php 
							if(Session::get('userRole') == '0'){?>
								|| <a onClick="return confirm('Do you really want to delete this user?')" href="?deluserid=<?php echo $result->id?>" style="color:red;">Delete</a>
						<?php	}?>
							 	
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