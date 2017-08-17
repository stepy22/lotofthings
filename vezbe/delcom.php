<?php 
    include("lib/session.php");
 Session::get('username');
?>
<?php include("config/config.php");?>
<?php include("lib/Database.php");?>
<?php
    $db = new Database();            // database instanca     (lib/Database.php)                  
?>
<?php 
    if(!isset($_GET['comid']) || $_GET['comid'] == NULL){ // proveravam da li postoji $_GET parametar delpage
        // echo "<script>window.location = 'catlist.php';</script>";  //js redirekcija na catlist.php
        header("Location: 404.php");         
    }else{
        $comid = $_GET['comid'];  

        $delquery = "DELETE FROM tbl_comments WHERE comment_id = '$comid'"; // brisem post po id-u
        $delcom = $db->delete($delquery);    								// metoda delete() 

        if($delcom){
        	echo "<script>alert('Komentar je uspesno obrisan.')</script>";   // alert :)
        	echo "<script>window.location = 'index.php'</script>";  	// redirekcija js-on
        }else{
        	echo "<script>alert('Greska. Komentar nije obrisan.')</script>";   // alert :)
        	echo "<script>window.location = 'index.php';</script>";  	// redirekcija js-on
        }
    }//kraj prvog else-a
// cela strana je copy/paste strane deletepost uz malo prepravke
