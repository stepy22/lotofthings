<?php include("inc/header.php"); ?>
<?php // ovo strana je vidnjiva samo za admin-a sajta, ako nije admin, redirencija na index.php
    if(!Session::get('userRole') == '0'){
        echo "<script>window.location = 'index.php';</script>";
}?>
<?php                      // proveravam preko sesije korisnikovu ulogu u admin panelu (Admin/ Author/ Editor)
	$userid   = Session::get('userId');                 // get metoda klase Session
	$userrole = Session::get('userRole');
?>
    <!-- Load TinyMCE -->
    <script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>
    <!-- /TinyMCE -->
    <style type="text/css">
        #tinymce{font-size:15px !important;}
    </style>
</head>
<body>
    <div class="container_12">
<?php include("inc/navigation.php"); ?>
        <div class="grid_10">
        
            <div class="box round first grid">
                <h2>Profil korinika</h2>
<?php 
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $name     = mysqli_real_escape_string($db->link,$_POST['name']);
        $username = mysqli_real_escape_string($db->link,$_POST['username']);
        $email    = mysqli_real_escape_string($db->link,$_POST['email']);
        $details  = mysqli_real_escape_string($db->link,$_POST['details']);

            $query = "UPDATE tbl_user          
                      SET 
                      name     = '$name',
                      username = '$username',
                      email    = '$email',
                      details  = '$details'
                      WHERE id = '$userid'";        // id preuzet iz sesije

            $updated_row = $db->update($query);
            if ($updated_row) {
                echo "<span class='success'>User Updated Successfully.</span>";
            }else {
                echo "<span class='error'>ERROR!! User Not Updated !</span>";
            } 
    } // kraj if-a
?>
                <div class="block">             
                 <form action="" method="POST" enctype="multipart/form-data">
                    <table class="form">  
    <?php 
    $query = "SELECT * FROM tbl_user WHERE id = '$userid' AND role = '$userrole'";
    $getuser = $db->select($query);
    if($getuser){
        	while($result = $getuser->fetch_object()){
?>                    
                        <tr>
                            <td>
                                <label>Ime:</label>
                            </td>
                            <td>
                                <input type="text" class="medium" name="name" value="<?php echo $result->name;?>"/>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Username:</label>
                            </td>
                            <td>
                                <input type="text" class="medium" name="username" value="<?php echo $result->username;?>"/>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Email:</label>
                            </td>
                            <td>
                                <input type="text" class="medium" name="email" value="<?php echo $result->email;?>"/>
                            </td>
                        </tr>
                        <tr>
                            <td style="vertical-align: top; padding-top: 9px;">
                                <label>Details</label>
                            </td>
                            <td>
                                <textarea class="tinymce" name="details">
                                    <?php echo $result->details; ?>
                                </textarea>
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>
                                <input type="submit" name="submit" Value="Save" />
                            </td>
                        </tr>
                    </table>
                    </form>
<?php }};  ?> 
                </div>
            </div>
        </div>
        <div class="clear">
        </div>
    </div>
    <div class="clear">
<?php include("inc/footer.php"); ?>
<script type="text/javascript">
    $(document).ready(function () {
        setupTinyMCE();
        setDatePicker('date-picker');
        $('input[type="checkbox"]').fancybutton();
        $('input[type="radio"]').fancybutton();
    });
</script>
<script type="text/javascript">
    $(document).ready(function () {
        setupLeftMenu();
        setSidebarHeight();
    });
</script>