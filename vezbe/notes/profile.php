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
    <style>
        #container{
            margin-top: 120px;
        }
    </style>
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
                <li class="active"><a href="">Profile</a></li>
                <li><a href="">Help</a></li>
                <li><a href="">Contact us</a></li>
                <li><a href="">My Notes</a></li></ul>

            <ul class="nav navbar-nav navbar-right">
                <li><a href="#">Logged as user</a></li>
                <li><a href="#">Logout</a></li></ul>
        </div></div>
</nav>
<!--Container -->
<div id="container">
    <div class="row">
        <div class="col-md-offset-3 col-md-6">
           <h2>Account Settings</h2>
            <div class="table-responsive">
                <table class="table table-striped table-hover table-condensed table-bordered">
                    <tr data-target="#updateusername" data-toggle="modal" >
                        <td>Username</td>
                        <td>Value</td>
                    </tr>
                    <tr data-target="#updateemail" data-toggle="modal">
                        <td>Email</td>
                        <td>Vall</td>
                    </tr>
                    <tr data-target="#updatepassword" data-toggle="modal">
                        <td>Password</td>
                        <td>Hidden</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <?php include "updateprofile.php";?>
</div>
<div class="footer">
    <div class="container">
        <p>OwlNet copyRight &copy; 2016-<?php $today=date("Y");echo $today; ?></p>
    </div>
</div>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>
</body>
</html>
