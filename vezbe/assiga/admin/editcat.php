<?php include("inc/header.php"); ?>
<?php 
    if(!isset($_GET['catid']) || $_GET['catid'] == NULL){ // proveravam da li postoji $_GET parametar catid
        // echo "<script>window.location = 'catlist.php';</script>";  //js redirekcija na catlist.php
        header("Location: catlist.php");         
    }else{
        $id = $_GET['catid'];       
    }
?>
</head>
<body>
    <div class="container_12">
<?php include("inc/navigation.php"); ?>
        <div class="grid_10">       
            <div class="box round first grid">
                <h2>Update kategorije</h2>
               <div class="block copyblock"> 
 <?php 
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $name = mysqli_real_escape_string($db->link, $name); //validacija unosa,copy/paste sa login strane
    if (empty($name)) {
        echo "<span class='error'>Field is empty</span>";
    } else{
        $query = "UPDATE tbl_category SET name = '$name' WHERE id = '$id'";   // query za edit
        $updated_cat = $db->update($query);                      // metoda update() Database klase
        if($updated_cat){
            echo "<span class='success'>Category is Updated successfully</span>";
        }else{
            echo "<span class='error'>Error!! Category is not Updated!!!</span>";
        }
    }
} 
?>
<?php    // popunjavam value za input  //////
    $query = "SELECT * FROM tbl_category WHERE id = '$id' ORDER BY id DESC";
    $category = $db->select($query);
    while ($result = $category->fetch_object()) {        
?>
                 <form action="" method="POST">
                    <table class="form">                    
                        <tr>
                            <td>
                                <input type="text" class="medium" name="name" value=<?php echo $result->name; ?> />
                            </td>
                        </tr>
                        <tr> 
                            <td>
                                <input type="submit" name="submit" Value="Save" />
                            </td>
                        </tr>
                    </table>
                    </form>
        <?php } ?> <!-- Kraj while petlje -->
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