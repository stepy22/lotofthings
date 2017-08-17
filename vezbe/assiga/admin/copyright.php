<?php include("inc/header.php"); ?>
</head>
<body>
    <div class="container_12">
<?php include("inc/navigation.php") ?>
        <div class="grid_10">       
            <div class="box round first grid">
                <h2>Update Copyright Text</h2>
<?php 
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $copyright   = $fm->validation($_POST['copyright']);
    $copyright   = mysqli_real_escape_string($db->link, $copyright);                //validacija unosa

    if ($copyright == "") {
        echo "<span class='error'>You must input field.</span>";
    } else{
        $query = "UPDATE tbl_footer 
                  SET 
                  footer =  '$copyright'
                  WHERE id = '1'";                                       // query za update
        $footer = $db->update($query);                                  // metoda update() Database klase
        if($footer){
            echo "<span class='success'>Copyright is Updated successfully</span>";
        }else{
            echo "<span class='error'>Error. Copyyright are not updated!!!</span>";
        }
    } // kraj else-a
} // kraj gornjeg if-a
?>
                <div class="block copyblock"> 
            <?php 
                $query = "SELECT * FROM tbl_footer WHERE id = '1'";
                $select = $db->select($query);
                if ($select) {
                    while($result = $select->fetch_object()){
            ?> 
                <form action="copyright" method="post">
                    <table class="form">                   
                        <tr>
                            <td>
                                <input type="text" value="<?php echo $result->footer; ?>" name="copyright" class="large" />
                            </td>
                        </tr>
                        
                         <tr> 
                            <td>
                                <input type="submit" name="submit" Value="Update" />
                            </td>
                        </tr>
                    </table>
                    </form>
            <?php }} ?> <!-- kraj while petlje i if-a -->
                </div>
            </div>
        </div>
        <div class="clear">
        </div>
<?php include("inc/footer.php"); ?>
    <script type="text/javascript">
        $(document).ready(function () {
            setupLeftMenu();
            setSidebarHeight();
        });
    </script>