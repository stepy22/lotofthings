<?php include("inc/header.php"); ?>
<style>
    .leftside{
        float: left; width: 70%;
    }

    .rightside{
        float: left; width: 20%;
    }

    .rightside img{
        float: left; height: : 200px; width: 200px;
    }
</style>
</head>
<body>
    <div class="container_12">
<?php include("inc/navigation.php"); ?>
        <div class="grid_10">		
            <div class="box round first grid">
                <h2>Update Site Title, Description and Logo</h2>
<!--  copy/paste sa edit post -->
<?php 
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $title  = $fm->validation($_POST['title']);          // metoda validation() klase Format
        $slogan = $fm->validation($_POST['slogan']);

        $title  = mysqli_real_escape_string($db->link, $title);
        $slogan = mysqli_real_escape_string($db->link, $slogan);
//////////// upload slika sa validacijom //////////////
        $permited  = array('png');
        $file_name = $_FILES['logo']['name'];
        $file_size = $_FILES['logo']['size'];
        $file_temp = $_FILES['logo']['tmp_name'];

        $div = explode('.', $file_name);
        $file_ext = strtolower(end($div));
        $same_image = 'logo'.'.'.$file_ext;
        $uploaded_image = "upload/".$same_image;

        if ($title == "" || $slogan == "") {
            echo "<span class='error'>Field can not be empty!</span>";
        }else{
            if(!empty($file_name)){

                if ($file_size >1048567) {
                echo "<span class='error'>Image Size should be less then 1MB!</span>";
            
                }elseif (in_array($file_ext, $permited) === false) {
                    echo "<span class='error'>You can upload only:-".implode(', ', $permited)."</span>";           
                }else{
                    move_uploaded_file($file_temp, $uploaded_image);
                    $query = "UPDATE title_slogan         
                              SET 
                              title    = '$title',
                              slogan   = '$slogan',
                              logo     = '$uploaded_image'
                              WHERE id = '1'";        

                    $updated_rows = $db->update($query);
                    if ($updated_rows) {
                        echo "<span class='success'>Data Updated Successfully.</span>";

                    }else {
                        echo "<span class='error'>ERROR!! Data Not Updated !</span>";
                    }   
                }// kraj else-a
            }else{
                $query = "UPDATE title_slogan           
                          SET 
                          title    = '$title',
                          slogan   = '$slogan'
                          WHERE id = '1'";     
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
                <div class="block sloginblock"> 
            <?php 
                $query = "SELECT * FROM title_slogan where id = '1'";  // query ka bazi 
                $slogan = $db->select($query);
                if($slogan){
                    while ($result = $slogan->fetch_object()) {
            ?>
                    <div class="leftside">             
                        <form action="" method="POST" enctype="multipart/form-data">
                            <table class="form">					
                                <tr>
                                    <td>
                                        <label>Website Title</label>
                                    </td>
                                    <td>
                                        <input type="text" value="<?php echo $result->title;?>"  name="title" class="medium" />
                                    </td>
                                </tr>
        						<tr>
                                    <td>
                                        <label>Website Slogan</label>
                                    </td>
                                    <td>
                                        <input type="text" value="<?php echo $result->slogan; ?> " name="slogan" class="medium" />
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label>Upload Logo</label>
                                    </td>
                                    <td>
                                        <input type="file" name="logo" class="medium" />
                                    </td>
                                </tr>
        						 
        						
        						 <tr>
                                    <td>
                                    </td>
                                    <td>
                                        <input type="submit" name="submit" Value="Update" />
                                    </td>
                                </tr>
                            </table>
                        </form>

                    </div><!-- Kraj  leftside diva  -->
                    <div class="rightside">
                        <img src="<?php echo $result->logo; ?>" alt="logo">
                    </div>
                </div>
            </div>
        </div>
    <?php }} ?> <!-- Kraj while petlje i if-a -->
        <div class="clear">
        </div>
    </div>
<?php include("inc/footer.php"); ?>
<script type="text/javascript">
    $(document).ready(function () {
        setupLeftMenu();
        setSidebarHeight();
    });
</script>