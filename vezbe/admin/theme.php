<?php include("inc/header.php"); ?>
</head>
<body>
    <div class="container_12">
<?php include("inc/navigation.php"); ?>
        <div class="grid_10">       
            <div class="box round first grid">
                <h2>Themes</h2>
               <div class="block copyblock"> 
 <?php 
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $theme = $_POST['theme'];
        $query = "UPDATE tbl_theme SET theme = '$theme' WHERE id = '1'";   // query za edit
        $updated_theme = $db->update($query);                      // metoda update() Database klase
        if($updated_theme){
            echo "<span class='success'>Theme is Updated successfully</span>";
        }else{
            echo "<span class='error'>Error!! Theme is not Updated!!!</span>";
        }
} 
?>
<?php    
    $query = "SELECT * FROM tbl_theme WHERE id = '1'";
    $themes = $db->select($query);
    while ($result = $themes->fetch_object()) {        
?>
            <h3>OVA STRANA JE U PRIPREMIIIIIII</h3>
                 <form action="" method="POST">
                    <table class="form">                    
                        <tr>
                            <td>
                                <input <?php if ($result->theme == 'default') {echo "checked";} ?> type="radio" name="theme" value="default">Default
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input <?php if ($result->theme == 'green') {echo "checked";} ?> type="radio" name="theme" value="green">Green
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input <?php if ($result->theme == 'red') {echo "checked";} ?> type="radio" name="theme" value="red">Red
                            </td>
                        </tr>
                        <tr> 
                            <td>
                                <input type="submit" name="submit" Value="Change" />
                            </td>
                        </tr>
                    </table>
                    </form>
         <?php } ?>
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