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
                <h2>Add New Post</h2>
<?php 
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $title = mysqli_real_escape_string($db->link,  $_POST['title']);
        $cat = mysqli_real_escape_string($db->link,    $_POST['cat']);
        $body = mysqli_real_escape_string($db->link,   $_POST['body']);
        $tags = mysqli_real_escape_string($db->link,   $_POST['tags']);
        $author = mysqli_real_escape_string($db->link, $_POST['author']);
        $userId = mysqli_real_escape_string($db->link, $_POST['userId']);
//////////// upload slika sa validacijom //////////////
        $permited  = array('jpg', 'jpeg', 'png', 'gif');
        $file_name = $_FILES['image']['name'];
        $file_size = $_FILES['image']['size'];
        $file_temp = $_FILES['image']['tmp_name'];

        $div = explode('.', $file_name);
        $file_ext = strtolower(end($div));
        $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
        $uploaded_image = "upload/".$unique_image;

        if ($title == "" || $cat == "" || $body == "" || $tags == "" || $tags == "" || $file_name == "") {
            echo "<span class='error'>Field can not be empty!</span>";

        }elseif (empty($file_name)) {
            echo "<span class='error'>Please Select any Image !</span>";

        }elseif ($file_size >1048567) {
            echo "<span class='error'>Image Size should be less then 1MB!</span>";
        
        }elseif (in_array($file_ext, $permited) === false) {
            echo "<span class='error'>You can upload only:-".implode(', ', $permited)."</span>";
        }else{
            move_uploaded_file($file_temp, $uploaded_image);

            $query = "INSERT INTO tbl_post(cat, title, body, image, author, tags, userId) VALUES('$cat','$title', '$body', '$uploaded_image', '$author', '$tags', '$userId')";

            $inserted_rows = $db->insert($query);

                if ($inserted_rows) {
                    echo "<span class='success'>Post Inserted Successfully.</span>";

                }else {
                    echo "<span class='error'>Post Not Inserted !</span>";
                }   
        }// kraj else-a
    } // kraj if-a
?>
                <div class="block">               
                 <form action="addpost.php" method="POST" enctype="multipart/form-data">
                    <table class="form">                    
                        <tr>
                            <td>
                                <label>Title</label>
                            </td>
                            <td>
                                <input type="text" placeholder="Enter Post Title..." class="medium" name="title" />
                            </td>
                        </tr>                    
                        <tr>
                            <td>
                                <label>Category</label>
                            </td>
                            <td>
                                <select id="select" name="cat">
                                    <option>Select Category:</option>
                        <?php 
                            $query = "SELECT * FROM tbl_category";
                            $category = $db->select($query);

                            if ($category) {
                                while ($result = $category->fetch_object()) {
                        ?>
                                    <option value="<?php echo $result->id; ?>"><?php echo $result->name; ?></option>
                        <?php  } }?> 
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Upload Image</label>
                            </td>
                            <td>
                                <input type="file" name="image" />
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
                            <td>
                                <label>Tags</label>
                            </td>
                            <td>
                                <input type="text" placeholder="Enter Tags..." class="medium" name="tags" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Author</label>
                            </td>
                            <td>
                                <input type="text" value="<?php echo Session::get('username');?>" class="medium" name="author" />
                                <input type="hidden" value="<?php echo Session::get('userId');?>" class="medium" name="userId" />
                            </td>
                         </tr>
                        <tr>
                            <td></td>
                            <td>
                                <input type="submit" name="submit" Value="Objavi novi post" />
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