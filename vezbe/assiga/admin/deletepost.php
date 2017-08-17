<?php 
    include("../lib/session.php");
    Session::checkSession();                                // proveravam sesiju da li postoji 
?>
<?php include("../config/config.php");?>
<?php include("../lib/Database.php");?>
<?php include("../helpers/Format.php");?>
<?php
    $db = new Database();            // database instanca     (lib/Database.php)                  
?>
<?php 
    if(!isset($_GET['delpostid']) || $_GET['delpostid'] == NULL){ // proveravam da li postoji $_GET parametar delpostid
        // echo "<script>window.location = 'catlist.php';</script>";  //js redirekcija na catlist.php
        header("Location: postlist.php");         
    }else{
        $postid = $_GET['delpostid'];  
        	// query za bazu po $postid = $_GET['delpostid'];
        $query = "SELECT * FROM tbl_post WHERE id = '$postid'";  			// selektujem po id-u
        $getdata = $db->select($query);
        if($getdata){
        	while ($delimg = $getdata->fetch_object()){     // brisem sliku posle brisanja post-a
        		$delimage = $delimg->image;
        		unlink($delimage);
        	}
        }// kraj if-a

        $delquery = "DELETE FROM tbl_post WHERE id = '$postid'"; // brisem post po id-u
        $delpost = $db->delete($delquery);    								// metoda delete() 

        if($delpost){
        	echo "<script>alert('Post deleted successfully.')</script>";   // alert :)
        	echo "<script>window.location = 'postlist.php';</script>";  	// redirekcija js-on
        }else{
        	echo "<script>alert('ERROR!! Post not deleted.')</script>";   // alert :)
        	echo "<script>window.location = 'postlist.php';</script>";  	// redirekcija js-on
        }
    }//kraj prvog else-a
?>