<?php include("inc/header.php"); ?>
</head>
<body>
    <div class="container_12">
 <?php include("inc/navigation.php"); ?>
        <div class="grid_10">       
            <div class="box round first grid">
                <h2>Dashbord</h2>
                <div class="block">               
                  Welcome admin panel        
                </div>
            </div>
        </div>
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