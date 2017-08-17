<!-- <?php                // proveravam preko sesije korisnikovu ulogu u admin panelu (Admin/ Author/ Editor)
    // $userid = Session::get('userId');                 // get metoda klase Session
?> -->
       <div class="grid_12 header-repeat">
            <div id="branding">
                <div class="floatleft logo">
                    <img src="upload/logo.png" alt="Logo" />
                </div>
                <div class="floatleft middle">
                    <h1>Admin Panel</h1>
                </div>
                <div class="floatright">
                    <div class="floatleft">
                        <img src="img/img-profile.jpg" alt="Profile Pic" /></div>
            <?php                               // zatvaram sesiju posle klika na logout
                if(isset($_GET['action']) && $_GET['action'] == "logout"){
                    Session::destroy();
                }
             ?>
                    <div class="floatleft marginleft10">
                        <ul class="inline-ul floatleft">
                            <li>Welcome: <?php echo Session::get('username') ?></li>
                            <li><a href="?action=logout">Logout</a></li>
                        </ul>
                    </div>
                </div>
                <div class="clear">
                </div>
            </div>
        </div>
        <div class="clear">
        </div>
        <div class="grid_12">
            <ul class="nav main">
                <li class="ic-dashboard"><a href="index.php"><span>Dashboard</span></a> </li>
                <li class="ic-dashboard"><a href="theme.php"><span>Theme</span></a> </li>
                <li class="ic-form-style"><a href="profile.php"><span>User Profile</span></a></li>
                <li class="ic-typography"><a href="changepassword.php"><span>Change Password</span></a></li>
                <li class="ic-typography"><a href="comments.php"><span>Comments</span></a></li>
                <li class="ic-grid-tables"><a href="inbox.php"><span>Inbox

        <?php    // ispisujem ako postoji nova poruka po status parametru iz tabele tbl_contact
            $query = "SELECT * FROM tbl_contact WHERE status = '0'";
            $msg   = $db->select($query);
            if($msg){
                $count = mysqli_num_rows($msg);
                echo "(".$count.")";
            }else{
                echo "(0)";
            }
        ?>
                </span></a></li>
                <li class="ic-typography"><a href="../index.php"><span>Visit site</span></a></li>

        <?php   // prava korisnika i dozvola  - admin ima dodatnu opciju da dodaje nove korinike, da vidi listu korisnika
            if(Session::get('userRole') == '0'){
                echo "<li class='ic-dashboard'><a href='adduser.php'><span>Add User</span></a> </li>";
                echo "";
            }?>
               <li class='ic-dashboard'><a href="userlist.php"><span>User List</span></a> </li> 
            </ul>
        </div>
        <div class="clear">
        </div>
        <div class="grid_2">
            <div class="box sidemenu">
                <div class="block" id="section-menu">
                    <ul class="section menu">
                       <li><a class="menuitem">Site Option</a>
                            <ul class="submenu">
                                <li><a href="titleslogan.php">Title & Slogan</a></li>
                                <li><a href="social.php">Social Media</a></li>                                <li><a href="copyright.php">Copyright</a></li>
                            </ul>
                        </li>                       
                         <li><a class="menuitem">Pages</a>
                            <ul class="submenu">
                                <li><a href="addpage.php">Add New Page</a></li>
                        <?php 
                            $query = "SELECT * FROM tbl_page";
                            $page  = $db->select($query);
                            if($page){
                                while($result = $page->fetch_object()){
                        ?>
                                <li><a href="page.php?pageid=<?php echo $result->id; ?>"><?php echo $result->name; ?></a></li>
                        <?php }} ?>
                            </ul>
                        </li>
                        <li><a class="menuitem">Category Option</a>
                            <ul class="submenu">
                                <li><a href="addcat.php">Add Category</a> </li>
                                <li><a href="catlist.php">Category List</a> </li>
                            </ul>
                        </li>
                        <li><a class="menuitem">Post Option</a>
                            <ul class="submenu">
                                <li><a href="addpost.php">Add Post</a> </li>
                                <li><a href="postlist.php">Post List</a> </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>