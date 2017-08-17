<?php include("inc/header.php"); ?>
<?php 
    if(!isset($_GET['pageid']) || $_GET['pageid'] == NULL){
        echo "<script>window.location = 'index.php';</script>";  // redirekcija ako nema get parametra
    }else{
        $id = $_GET['pageid'];
    }
?>
    <!-- Load TinyMCE -->
    <script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>
    <!-- /TinyMCE -->
    <style type="text/css">
        #tinymce{font-size:15px !important;}
        .delpage{
            margin-left: 418px;
        }
        .delpage a{
            background-color: #eee;
            color: red;
            cursor: pointer;
            font-size: 20px;
            padding:4px 12px;
            border-radius: 3px;
            border: 1px solid #ddd;
            font-weight: normal;
        }
    </style>
</head>
<body>
    <div class="container_12">
<?php include("inc/navigation.php"); ?>
        <div class="grid_10">
        
            <div class="box round first grid">
                <h2>Update Page</h2>
<?php 
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {                         // copy/paste addpost i prepravka
        $name = mysqli_real_escape_string($db->link, $_POST['name']);
        $body = mysqli_real_escape_string($db->link, $_POST['body']);

        if ($name == "" || $body == "") {
            echo "<span class='error'>Field can not be empty!</span>";

        }else{
            $query = "UPDATE tbl_page SET name = '$name', body = '$body' WHERE id = '$id'";                     // get parametar $_GET['pageid']; vidi gore
            $update_page = $db->update($query);
                if ($update_page) {
                    echo "<span class='success'>Page Updated Successfully.</span>";

                }else {
                    echo "<span class='error'>Error!! Page Not Updated !!</span>";
                }   
        }// kraj else-a
    } // kraj if-a
?>
                <div class="block">  
        <?php 
            $query  = "SELECT * FROM tbl_page WHERE id = '$id'";       // id = $_GET['pageid']; vidi gore
            $select = $db->select($query);
            if ($select) {
                while($result = $select->fetch_object()){
        ?>    
                 <form action="page.php?pageid=<?php echo $result->id; ?>" method="POST" enctype="multipart/form-data">
                    <table class="form">                    
                        <tr>
                            <td>
                                <label>Name</label>
                            </td>
                            <td>
                                <input type="text" class="medium" name="name" value="<?php echo $result->name ?>" />
                            </td>
                        </tr>
                        <tr>
                            <td style="vertical-align: top; padding-top: 9px;">
                                <label>Content</label>
                            </td>
                            <td>
                                <textarea class="tinymce" name="body">
                                    <?php echo $result->body; ?>
                                </textarea>
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>
                                <input type="submit" name="submit" Value="Update page" />
                                <span class="delpage">
                                    <a onClick="return confirm('Do you really want to delete this Page?')" href="deletepage.php?delpage=<?php echo $result->id; ?>">Delete page</a>
                                </span>
                            </td>
                        </tr>
                    </table>
                    </form>
            <?php } } ?> <!-- kraj while petlje i if-a -->
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