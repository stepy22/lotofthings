<?php include("inc/header.php"); ?>
<?php 
    if(!isset($_GET['msgid']) || $_GET['msgid'] == NULL){
        header("Location: inbox.php");
    }else{
        $id = $_GET['msgid'];
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
                <h2>Odgovori na poruku</h2>
<?php 
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {                         // copy/paste viuwmsg.php i prepravka
////              malo validacije        /////
        $to       = $fm->validation($_POST['toemail']);
        $from     = $fm->validation($_POST['fromemail']);
        $subject  = $fm->validation($_POST['subject']);
        $message  = $fm->validation($_POST['message']);
////   slanje mail-a    ///////            vidi na php.net-u da se podsetiš
        $sendmail = mail($to, $subject, $message, $from);

        if($sendmail){
            echo "<span class='success'>Poruka je uspešno poslata.</span>";
        }else{
            echo "<span class='error'>Greška!! Poruka nije poslata.</span>";
        }


    } // kraj if-a
?>
                <div class="block">               
                 <form action="" method="POST">
                 <?php 
                    $query   = "SELECT * FROM tbl_contact WHERE id = '$id'";
                    $message = $db->select($query);
                    if($message){
                        while($result = $message->fetch_object()){
                ?>  
                    <table class="form">                  
                        <tr>
                            <td>
                                <label>Za:</label>
                            </td>
                            <td>
                                <input type="text" class="medium" readonly name="toemail" value="<?php echo $result->email; ?>" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Od:</label>
                            </td>
                            <td>
                                <input type="text" class="medium" name="fromemail" placeholder="Unesi svoju email adresu..." />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Naslov poruke:</label>
                            </td>
                            <td>
                                <input type="text" class="medium" name="subject" placeholder="Unesi naslov poruke..." />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Poruka:</label>
                            </td>
                            <td>
                                <textarea class="tinymce" name="message">
                                       
                                </textarea>
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>
                                <input type="submit" name="submit" Value="Pošalji poruku" />
                            </td>
                        </tr>
                <?php }} ?>
                    </table>
                    </form>
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