<?php include("inc/header.php"); ?>
<?php 
    if(!isset($_GET['editpostid']) || $_GET['editpostid'] == NULL){ // proveravam da li postoji $_GET parametar editpostid
        // echo "<script>window.location = 'catlist.php';</script>";  //js redirekcija na catlist.php
        header("Location: postlist.php");         
    }else{
        $postid = $_GET['editpostid'];       
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
                <h2>Edit Post</h2>
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

        if ($body == "") {
            echo "<span class='error'>You must change at least one field!</span>";
        }else{
            if(!empty($file_name)){

                if ($file_size >1048567) {
                echo "<span class='error'>Image Size should be less then 1MB!</span>";
            
                }elseif (in_array($file_ext, $permited) === false) {
                    echo "<span class='error'>You can upload only:-".implode(', ', $permited)."</span>";
            
                }else{
                    move_uploaded_file($file_temp, $uploaded_image);
                    $query = "UPDATE tbl_post          
                              SET 
                              cat      = '$cat',
                              title    = '$title',
                              body     = '$body',
                              image    = '$uploaded_image',
                              author   = '$author',
                              tags     = '$tags',
                              userId   = '$userId'
                              WHERE id = '$postid'";        // Get parametar

                    $updated_rows = $db->update($query);
                    if ($updated_rows) {
                        echo "<span class='success'>Post Updated Successfully.</span>";

                    }else {
                        echo "<span class='error'>ERROR!! Post Not Updated !</span>";
                    }   
                }// kraj else-a
            }else{
                $query = "UPDATE tbl_post          
                          SET 
                          cat      = '$cat',
                          title    = '$title',
                          body     = '$body',
                          author   = '$author',
                          tags     = '$tags',
                          userId   = '$userId'
                          WHERE id = '$postid'";        // Get parametar

                $updated_rows = $db->update($query);
                if ($updated_rows) {
                    echo "<span class='success'>Post Updated Successfully.</span>";

                }else {
                    echo "<span class='error'>ERROR!! Post Not Updated !</span>";
                }  
            } // kraj else-a
        }// kraj prvog else-a
    } // kraj prvog if-a
?>
                <div class="block">    
<?php 
    $query = "SELECT * FROM tbl_post WHERE id = '$postid' ORDER BY id DESC";
    $getpost = $db->select($query);
        while($postresult = $getpost->fetch_object()){
?>           
                 <form action="" method="POST" enctype="multipart/form-data">
                    <table class="form">                    
                        <tr>
                            <td>
                                <label>Title</label>
                            </td>
                            <td>
                                <input type="text" class="medium" name="title" value="<?php echo $postresult->title;?>"/>
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
                                    <option 
                        <?php 
        // selektujem kategoriju po id-u za editovanje, presekao sam php 
                            if ($postresult->cat == $result->id) { ?>                           
                                selected="selected"
                        <?php }?> value="<?php echo $result->id; ?>"><?php echo $result->name; ?>
                                            
                                    </option>
                        <?php  } }?> 
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Upload Image</label>
                            </td>
                            <td>    
                                <img src="<?php echo $postresult->image;?>"" height="100px" width="200px"  alt="slika"><br>
                                <input type="file" name="image" />
                            </td>
                        </tr>
                        <tr>
                            <td style="vertical-align: top; padding-top: 9px;">
                                <label>Content</label>
                            </td>
                            <td>
                                <textarea class="tinymce" name="body">
                                    <?php echo $postresult->body; ?>
                                </textarea>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Tags</label>
                            </td>
                            <td>
                                <input type="text" class="medium" name="tags" value="<?php echo $postresult->tags?>"/>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Author</label>
                            </td>
                            <td>
                                <input type="text" class="medium" name="author" value="<?php echo $postresult->author?>" />
                                <input type="hidden" value="<?php echo Session::get('userId');?>" class="medium" name="userId" />
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
<?php };  ?> <!-- Kraj while petlje -->
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