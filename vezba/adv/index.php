<?php 
require "config.php";
$page = Page::GetById((isset($_GET['pid'])&&is_numeric($_GET['pid']))?$_GET['pid']:1);
?><!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title><?php echo $page->name; ?></title>
<link rel="stylesheet" type="text/css" href="resources/css/layout.css">
<link rel="stylesheet" type="text/css" href="resources/css/html-elements.css">
<script type="text/javascript" src="resources/js/jquery-2.0.3.min.js"></script>
</head>

<body>

	<div id="header">
    	<div id="headerInner">
        
        	<div id="logo">
            	<img src="resources/images/logo.png" width="119" height="40" alt="logo">
            </div><!-- logo -->
            
            
			<?php 
				include APP_DIR."/modules/mod_menu/index.php";  
			?>
			
            <div id="dm">
            	<a href="#" class="fb">facebook</a>
            	<a href="#" class="tw">twitter</a>
            	<a href="#" class="drb">dribble</a>
            </div><!-- dm -->
            
            <div id="search">
            </div><!-- search -->
            
        </div><!-- headerInner -->
    </div><!-- header -->
    
    
    <div id="wrapper">
    	<div id="wrapperInner">
        
        	<div id="main">
			 <?php
				foreach($page->modules_arr as $module){
					include APP_DIR."/modules/{$module}/index.php";
				}
			 ?>
            </div><!-- main -->
            
            <div id="sidebar">
               <?php include APP_DIR."/modules/mod_sidebar/index.php"; ?>                    
            </div><!-- sidebar -->
            
        </div><!-- wrapperInner -->
    </div><!-- wrapper -->

</body>
</html>
