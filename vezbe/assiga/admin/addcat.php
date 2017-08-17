<?php include("inc/header.php"); ?>
</head>
<body>
    <div class="container_12">
<?php include("inc/navigation.php"); ?>
        <div class="grid_10">       
            <div class="box round first grid">
                <h2>Dodaj kategoriju</h2>
               <div class="block copyblock"> 

 <?php 
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $name = mysqli_real_escape_string($db->link, $name); //validacija unosa,copy/paste sa login strane

    if (empty($name)) {
        echo "<span class='error'>Field is empty</span>";
    } else{
        $query = "INSERT INTO tbl_category(name) VALUES('$name')";     // query za unos
        $cat_insert = $db->insert($query);                      // metoda insert() Database klase
        if($cat_insert){
            echo "<span class='success'>New Category is Added successfully</span>";
        }else{
            echo "<span class='error'>Error. Category is not added!!!</span>";
        }
    }
} 
?>
                 <form action="addcat.php" method="POST">
                    <table class="form">                    
                        <tr>
                            <td>
                                <input type="text" placeholder="Enter Category Name..." class="medium" name="name" />
                            </td>
                        </tr>
                        <tr> 
                            <td>
                                <input type="submit" name="submit" Value="Save" />
                            </td>
                        </tr>
                    </table>
                    </form>
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
