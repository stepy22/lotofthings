<?php include "conn.php";?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Notes</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css?family=Arvo" rel="stylesheet">

</head>
<body>
<nav role="navigation" class="navbar-custom navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="">Notes</a>
            <button class="navbar-toggle" data-target="#navbarCollapse" data-toggle="collapse" type="button">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <div class="navbar-collapse collapse" id="navbarCollapse">
        <ul class="nav navbar-nav">
            <li class="active"><a href="">Home</a></li>
            <li><a href="">Help</a></li>
            <li><a href="">Contact us</a></li></ul>
            <ul class="nav navbar-nav navbar-right">

                <li><a data-toggle="modal" href="#loginmodal">Login</a></li></ul>
    </div></div>
</nav>
<div class="jumbotron" id="myContainer">
    <h1>Moja online sveska</h1>
    <p>Ovo je rad uradjen 9.5.2017</p>
    <p>Ima za svrhu prikaz sposobnosti i vezbe</p>
    <button data-target="#signmodal" data-toggle="modal" type="button" class="btn btn-lg green signup">Uloguj se besplatno</button>
</div>
<?php include "login.php"; ?>
<?php include "register.php"; ?>
<div class="footer">
    <div class="container">
        <p>OwlNet copyRight &copy; 2016-<?php $today=date("Y");echo $today; ?></p>
    </div>
</div>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>
<script src="index.js"></script>

</body>
</html>
