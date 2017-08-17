<?php include("inc/header.php"); ?>
<?php 
    if(!isset($_GET['userid']) || $_GET['userid'] == NULL){ // proveravam da li postoji $_GET parametar userid
        // echo "<script>window.location = 'userlist.php';</script>";  //js redirekcija na catlist.php
        header("Location: userlist.php");    // redirekcija ako ne postoji get parametar     
    }else{
        $id = $_GET['userid'];       
    }
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
                <h2>User Details:</h2>
<?php 
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    echo "<script>window.location = 'userlist.php';</script>";// redirekcija na viuwuser kad se klikne na ok
    }
?>
                <div class="block">             
                 <form action="" method="POST">
                    <table class="form">  
    <?php 
    $query = "SELECT * FROM tbl_user WHERE id = '$id'";
    $getuser = $db->select($query);
    if($getuser){
        	while($result = $getuser->fetch_object()){
?>                    
                        <tr>
                            <td>
                                <label>Ime:</label>
                            </td>
                            <td>
                                <input type="text" class="medium"  readonly value="<?php echo $result->name;?>"/>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Username:</label>
                            </td>
                            <td>
                                <input type="text" class="medium" readonly value="<?php echo $result->username;?>"/>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Email:</label>
                            </td>
                            <td>
                                <input type="text" class="medium" readonly value="<?php echo $result->email;?>"/>
                            </td>
                        </tr>
                        <tr>
                            <td style="vertical-align: top; padding-top: 9px;">
                                <label>Details</label>
                            </td>
                            <td>
                                <textarea class="tinymce" readonly name="details">
                                    <?php echo $result->details; ?>
                                </textarea>
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>
                                <input type="submit" name="submit" Value="Back" />
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