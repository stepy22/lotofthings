<?php include("inc/header.php"); ?>
</head>
<body>
    <div class="container_12">
<?php include("inc/navigation.php"); ?>
        <div class="grid_10">		
            <div class="box round first grid">
                <h2>Update Social Netwok Link's</h2>
                <div class="block">  
<?php 
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $facebook   = $fm->validation($_POST['facebook']);
    $twitter    = $fm->validation($_POST['twitter']);
    $linkedin   = $fm->validation($_POST['linkedin']);
    $googleplus = $fm->validation($_POST['googleplus']);

    $facebook   = mysqli_real_escape_string($db->link, $facebook); //validacija unosa,copy/paste sa login strane
    $twitter    = mysqli_real_escape_string($db->link, $twitter);
    $linkedin   = mysqli_real_escape_string($db->link, $linkedin);
    $googleplus = mysqli_real_escape_string($db->link, $googleplus);

    if (empty($facebook || $twitter ||$linkedin || $googleplus)) {
        echo "<span class='error'>You must Insert link's of social network's.</span>";
    } else{
        $query = "UPDATE tbl_social 
                  SET 
                  facebook =  '$facebook',
                  twitter  =  '$twitter',
                  linkedin = '$linkedin',
                  google   = '$googleplus'
                  WHERE id = '1'";     // query za update
        $social = $db->update($query);                      // metoda update() Database klase
        if($social){
            echo "<span class='success'>Link's is Updated successfully</span>";
        }else{
            echo "<span class='error'>Error. Link's are not updated!!!</span>";
        }
    } // kraj else-a
} // kraj gornjeg if-a
?>             
                 <form action="social.php" method="POST">
                    <table class="form">
    <?php 
        $query = "SELECT * FROM tbl_social WHERE id = '1'";
        $social = $db->select($query);
        if($social){
            while($result = $social->fetch_object()){
    ?>					
                        <tr>
                            <td>
                                <label>Facebook</label>
                            </td>
                            <td>
                                <input type="text" name="facebook" value="<?php echo $result->facebook; ?>" class="medium" />
                            </td>
                        </tr>
						 <tr>
                            <td>
                                <label>Twitter</label>
                            </td>
                            <td>
                                <input type="text" name="twitter" value="<?php echo $result->twitter;?>" class="medium" />
                            </td>
                        </tr>
						
						 <tr>
                            <td>
                                <label>LinkedIn</label>
                            </td>
                            <td>
                                <input type="text" name="linkedin" value="<?php echo $result->linkedin; ?>" class="medium" />
                            </td>
                        </tr>
						
						 <tr>
                            <td>
                                <label>Google Plus</label>
                            </td>
                            <td>
                                <input type="text" name="googleplus" value="<?php echo $result->google; ?>" class="medium" />
                            </td>
                        </tr>
						
						 <tr>
                            <td></td>
                            <td>
                                <input type="submit" name="submit" Value="Update" />
                            </td>
                        </tr>
                    </table>
                    </form>
                <?php }} ?> <!-- kraj while petlje i if-a  za select -->
                </div>
            </div>
        </div>
 <?php include("inc/footer.php") ?>
    <script type="text/javascript">
        $(document).ready(function () {
            setupLeftMenu();
            setSidebarHeight();
        });
    </script>