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
                <h2>Viuw message</h2>
<?php 
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {                         // copy/paste addpost i prepravka
        echo "<script>window.location = 'inbox.php';</script>";// redirekcija na inbox.php kad je procitana poruka
    }
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
                                <label>Ime i prezime:</label>
                            </td>
                            <td>
                                <input type="text" class="medium"  readonly value="<?php echo $result->firstname.' '.$result->lastname; ?>" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Email:</label>
                            </td>
                            <td>
                                <input type="text" class="medium" readonly value="<?php echo $result->email; ?>" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Datum:</label>
                            </td>
                            <td>
                                <input type="text" class="medium" readonly value="<?php echo $fm->formatDate($result->date); ?>" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Poruka:</label>
                            </td>
                            <td>
                                <textarea class="tinymce" name="message">
                                    <?php echo $result->message; ?>    
                                </textarea>
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>
                                <input type="submit" name="submit" Value="Ok" />
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