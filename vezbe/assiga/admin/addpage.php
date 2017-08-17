<?php include("inc/header.php"); ?>
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
                <h2>Add New Page</h2>
<?php 
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {                         // copy/paste addpost i prepravka
        $name = mysqli_real_escape_string($db->link, $_POST['name']);
        $body = mysqli_real_escape_string($db->link, $_POST['body']);

        if ($name == "" || $body == "") {
            echo "<span class='error'>Field can not be empty!</span>";

        }else{
            $query = "INSERT INTO tbl_page(name, body) VALUES('$name','$body')";

            $inserted_rows = $db->insert($query);

                if ($inserted_rows) {
                    echo "<span class='success'>Page Created Successfully.</span>";

                }else {
                    echo "<span class='error'>Error!! Page Not Created !</span>";
                }   
        }// kraj else-a
    } // kraj if-a
?>
                <div class="block">               
                 <form action="addpage.php" method="POST" enctype="multipart/form-data">
                    <table class="form">                    
                        <tr>
                            <td>
                                <label>Name</label>
                            </td>
                            <td>
                                <input type="text" class="medium" name="name" />
                            </td>
                        </tr>
                        <tr>
                            <td style="vertical-align: top; padding-top: 9px;">
                                <label>Content</label>
                            </td>
                            <td>
                                <textarea class="tinymce" name="body"></textarea>
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>
                                <input type="submit" name="submit" Value="Create Page" />
                            </td>
                        </tr>
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