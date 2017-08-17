<?php
//require 'classes/widget.php';//ova mora ici prva
//require 'classes/simpleWidget.php';-ovo moze kad ima par klasa a naredno kad ima vise

require_once 'config.php';
Database::konektujSe();


$s=Strana::getStrana(isset ($_GET ['strana'])?$_GET['strana']:1);


?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,400i,700,700i&amp;subset=latin-ext" rel="stylesheet">
<link href="font-awesome/css/font-awesome.min.css" rel ="stylesheet" type= "text/css">
<link href="CSS/style.css" rel="stylesheet" type="text/css">
</head>

<body>
<div id="wrapper">

	<div id="header">
    	<div id="logo">
        <a href="index.html">
    		<img src="images/logo.png" alt="lineweb">
         </a>
    	</div>
        <div id="slogan">
        	<p>Lorem ipsum dolor.</p>
        </div>
	</div>
	<div id="nav">
    <ul>
    	<li><a href ="index.html">Home page</a></li>
        <li><a href ="work.html">Work</a></li>
        <li><a href ="info.html">Info</a></li>
        <li><a href ="about.html">About as</a>
        	<ul>
            	<li><a href ="story.html">Our story</a>
                	<ul> 
                    <li><a href="#">prvi link</a></li>
                    <li><a href="#">drugi link</a></li>
                    <li><a href="#">treci link</a></li>
                    <li><a href="#">cetvrti link</a></li>
                    </ul>
                
                </li>
                <li><a href ="contact-us.html">Contact us</a></li>
            </ul>
        </li>
        <li><a href ="gallery.html">Gallery</a></li>
    </ul>
    <div id="social">
    	<a href="#"><i class="fa fa-facebook-square" aria-hidden="true"></i></a>
        
        <a href="#"><i class="fa fa-twitter-square" aria-hidden="true"></i></a>
        
        <a href="#"><i class="fa fa-linkedin-square" aria-hidden="true"></i></a>
    </div>
	</div>
	<div id="main">
          <?php
	foreach ($s->center as $w) {
		$widget=new $w;
		$widget->show();//jedino sto je zajednicko je funkcija
	}

	?>
	</div>
	<div id="sidebar">
    <?php
	foreach ($s->sidebar as $w) {
		$widget=new $w;
		$widget->show();//jedino sto je zajednicko je funkcija
	}
	?>
    <div class="block">
    <h2>Treći</h2>
 <p><a href="#"><img src="images/location.png" alt="mapa"></a></p>
 <p><a href="#">Pogledajte detaljnije</a></p>   
	</div>
    </div>
	<div id="footer">
    	<p>Copyright &copy; Lineweb</p>
	</div>
    </div>
</body>
</html>
