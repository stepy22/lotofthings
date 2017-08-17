<meta name="language" content="English">
<meta name="description" content="Moj prvi blog Sajt">
<?php            // meta tagovi - vadim tags iz tabele tbl_post a ako ih nema, uzimam iz config file-a
if (isset($_GET['id'])) {
	$keywords  = $_GET['id'];
	$query     = "SELECT * FROM tbl_post WHERE id = '$keywords'";
	$words     = $db->select($query);
	if($words){
		while($res = $words->fetch_object()){ ?>
<meta name="keywords" content="<?php echo $res->tags; ?>">
<?php }}}else{ ?>
<meta name="keywords" content="<?php echo KEYWORDS; ?>">	
<?php }?>
<meta name="author" content="Simke, Simke021">