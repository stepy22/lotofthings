<?php include("inc/header.php"); ?>
<?php // ovo strana ima pravo da radi samo za admin-a sajta, ako nije admin, redirencija na index.php
    if(!Session::get('userRole') == '0'){
        echo "<script>window.location = 'index.php';</script>";
}?>
</head>
<body>
    <div class="container_12">
 <?php include("inc/navigation.php"); ?>
        <div class="grid_10">		
            <div class="box round first grid">
                <h2>Change Password</h2>
                <div class="block">               
                 <form>
                    <table class="form">					
                        <tr>
                            <td>
                                <label>Old Password</label>
                            </td>
                            <td>
                                <input type="password" placeholder="Enter Old Password..."  name="title" class="medium" />
                            </td>
                        </tr>
						 <tr>
                            <td>
                                <label>New Password</label>
                            </td>
                            <td>
                                <input type="password" placeholder="Enter New Password..." name="slogan" class="medium" />
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