<?php 
    include("../lib/session.php");
    Session::checkSession();                                // proveravam sesiju da li postoji 
?>
<?php include("../config/config.php");?>
<?php include("../lib/Database.php");?>
<?php
    $db = new Database();            // database instanca     (lib/Database.php)                  
?>
<?php 
    if(!isset($_GET['delpage']) || $_GET['delpage'] == NULL){ // proveravam da li postoji $_GET parametar delpage
        // echo "<script>window.location = 'catlist.php';</script>";  //js redirekcija na catlist.php
        header("Location: index.php");         
    }else{
        $pageid = $_GET['delpage'];  

        $delquery = "DELETE FROM tbl_page WHERE id = '$pageid'"; // brisem post po id-u
        $delpost = $db->delete($delquery);    								// metoda delete() 

        if($delpost){
        	echo "<script>alert('Page deleted successfully.')</script>";   // alert :)
        	echo "<script>window.location = 'index.php';</script>";  	// redirekcija js-on
        }else{
        	echo "<script>alert('ERROR!! Page not deleted.')</script>";   // alert :)
        	echo "<script>window.location = 'index.php';</script>";  	// redirekcija js-on
        }
    }//kraj prvog else-a


// cela strana je copy/paste strane deletepost uz malo prepravke
?>
