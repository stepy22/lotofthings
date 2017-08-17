<?php include("inc/header.php"); ?>
<?php // ovo strana je vidnjiva samo za admin-a sajta, ako nije admin, redirencija na index.php
    if(!Session::get('userRole') == '0'){
        echo "<script>window.location = 'index.php';</script>";
}?>
</head>
<body>
    <div class="container_12">
<?php include("inc/navigation.php"); ?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Poruke</h2>
<?php   				// uzimam verdost seenid iz get parametra kako bih procitane poruke prebacio dole
	if (isset($_GET['seenid'])) {
		$seenid = $_GET['seenid'];   			// menjam vrednost status-a sa 0 na 1 u tabeli tbl_status
		$query  = "UPDATE tbl_contact
				   SET
				   status = '1'     
				   WHERE id ='$seenid'";

		$updated_row = $db->update($query);
			if ($updated_row) {
                echo "<span class='success'>Poruka je premeštena u pročitane poruke.</span>";

            }else {
                echo "<span class='error'>Greška!! Poruka nije premeštena u pročitane poruke!</span>";
            }   
	} // kraj gornjeg if-a
?>
                <div class="block">        
                    <table class="data display datatable" id="example">
					<thead>
						<tr class="even gradeX">
							<th>Broj</th>
							<th>Ime i prezime</th>
							<th>Email</th>
							<th>Poruka</th>
							<th>Datum</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
					<?php 
						$query   = "SELECT * FROM tbl_contact WHERE status = '0' ORDER BY id DESC";
						$message = $db->select($query);
						if($message){
							$i = 0;
							while($result = $message->fetch_object()){
							$i++
					?>
						<tr class="even gradeC">
							<td><?php echo $i; ?></td>
							<td><?php echo $result->firstname.' '.$result->lastname; ?> </td>
							<td><?php echo $result->email; ?></td>
							<td><?php echo $fm->readMoreShort($result->message, 50)?></td>
							<td><?php echo $fm->formatDate($result->date)?></td>
							<td>
								<a href="viuwmsg.php?msgid=<?php echo $result->id; ?>">Pročitaj</a> || 
								<a href="replymsg.php?msgid=<?php echo $result->id; ?>">Odgovori</a> ||
								<a href="?seenid=<?php echo $result->id;; ?>">Pročitaj kasnije</a>
							</td>
						</tr>
					<?php }} ?>
					</tbody>
				</table>
               </div>
            </div>
            <div class="box round first grid">
                <h2>Seenbox</h2>
<?php   				         // uzimam verdost delid iz get parametra kako bih obrisao poruku po id-u
	if (isset($_GET['delid'])) {
		$delmsg = $_GET['delid'];   			// menjam vrednost status-a sa 0 na 1 u tabeli tbl_status
		$delquery  = "DELETE FROM tbl_contact WHERE id = '$delmsg'";

		$del_msg = $db->delete($delquery);
			if ($del_msg) {
                echo "<span class='success'>Poruka je uspešno obrisana.</span>";

            }else {
                echo "<span class='error'>Greška!! Poruka nije obrisana!</span>";
            }   
	} // kraj gornjeg if-a
?>
                <div class="block">        
                    <table class="data display datatable" id="example">
					<thead>
						<tr class="even gradeX">
							<th>Broj</th>
							<th>Ime i prezime</th>
							<th>Email</th>
							<th>Poruka</th>
							<th>Datum</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
					<?php 
						$query   = "SELECT * FROM tbl_contact WHERE status = '1' ORDER BY id DESC";
						$message = $db->delete($query);
						if($message){
							$i = 0;
							while($result = $message->fetch_object()){
							$i++
					?>
						<tr class="even gradeC">
							<td><?php echo $i; ?></td>
							<td><?php echo $result->firstname.' '.$result->lastname; ?> </td>
							<td><?php echo $result->email; ?></td>
							<td><?php echo $fm->readMoreShort($result->message, 50)?></td>
							<td><?php echo $fm->formatDate($result->date)?></td>
							<td>
								<a href="viuwmsg.php?msgid=<?php echo $result->id; ?>">Pročitaj</a> ||
								<a href="?delid=<?php echo $result->id; ?>"" onClick="return confirm('Da li ste sigurni da želite da obrišete poruku?');">Obriši</a>
							</td>
						</tr>
					<?php }} ?>
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