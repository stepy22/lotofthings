	</div>

	<div class="footersection templete clear">
	  <div class="footermenu clear">
		<ul>
			<li><a href="index.php">Home</a></li>
			<li><a href="#">About</a></li>
			<li><a href="contact.php">Contact</a></li>
			<li><a href="#">Privacy</a></li>
		</ul>
	  </div>
	<?php 
		$query = "SELECT * FROM tbl_footer WHERE id = '1'";
        $select = $db->select($query);
        if ($select) {
            while($result = $select->fetch_object()){
	?>
	  <p>&copy; <?php echo $result->footer; ?> <?php echo date('Y'); ?></p>
	<?php }} ?> <!-- kraj while petlje i if-a -->
	</div>
	<div class="fixedicon clear">
	<?php 
		$query = "SELECT * FROM tbl_social WHERE id ='1'";
		$social = $db->select($query);
		if($social){
			while($result = $social->fetch_object()){
	?>
		<a href="<?php echo $result->facebook; ?>"><img src="images/fb.png" alt="Facebook"/></a>
		<a href="<?php echo $result->twitter; ?>"><img src="images/tw.png" alt="Twitter"/></a>
		<a href="<?php echo $result->linkedin; ?>"><img src="images/in.png" alt="LinkedIn"/></a>
		<a href="<?php echo $result->google; ?>"><img src="images/gl.png" alt="GooglePlus"/></a>
	<?php }} ?> <!-- kraj while petlje i if-a za secial -->
	</div>
<script type="text/javascript" src="js/scrolltop.js"></script>
</body>
</html>