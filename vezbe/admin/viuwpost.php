<?php include("inc/header.php"); ?>
<?php 
    if(!isset($_GET['viuwpostid']) || $_GET['viuwpostid'] == NULL){ // proveravam da li postoji $_GET parametar viuwpostid
        // echo "<script>window.location = 'catlist.php';</script>";  //js redirekcija na catlist.php
        header("Location: postlist.php");         
    }else{
        $postid = $_GET['viuwpostid'];       
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
                <h2>Viuw Post</h2>
<?php 
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {    // redirekcija postlist.php
        echo "<script>window.location = 'postlist.php';</script>";
    }
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
                                <input type="text" class="medium" readonly value="<?php echo $postresult->title;?>"/>
                            </td>
                        </tr>
                     
                        <tr>
                            <td>
                                <label>Category</label>
                            </td>
                            <td>
                                <select id="select" readonly">
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
                                <img src="<?php echo $postresult->image;?>"" height="150px" width="250px"  alt="slika"><br>
                            </td>
                        </tr>
                        <tr>
                            <td style="vertical-align: top; padding-top: 9px;">
                                <label>Content</label>
                            </td>
                            <td>
                                <textarea class="tinymce" readonly>
                                    <?php echo $postresult->body; ?>
                                </textarea>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Tags</label>
                            </td>
                            <td>
                                <input type="text" class="medium" readonly value="<?php echo $postresult->tags?>"/>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Author</label>
                            </td>
                            <td>
                                <input type="text" class="medium" readonly value="<?php echo $postresult->author?>" />
                            </td>
                         </tr>
                        <tr>
                            <td></td>
                            <td>
                                <input type="submit" name="submit" value="Ok" />
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