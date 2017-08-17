<?php include("inc/header.php"); ?>
<?php 
    if(!Session::get('userRole') == '0'){
        echo "<script>window.location = 'index.php';</script>";
    }
?>
</head>
<body>
    <div class="container_12">
<?php include("inc/navigation.php"); ?>
        <div class="grid_10">       
            <div class="box round first grid">
                <h2>Dodaj korisnika</h2>
               <div class="block copyblock"> 

 <?php 
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email    = $_POST['email'];
    // $details    = $_POST['details'];
    $role     = $_POST['role'];
    ///// validacija username-a i password-a metodom validation klase Fromat
    $username = $fm->validation($username);
    $password = $fm->validation(md5($password));
    $email    = $fm->validation($email);
    // $email = $fm->validation($email);
    // $details = $fm->validation($details);

    $username = mysqli_real_escape_string($db->link, $username); //validacija unosa,copy/paste sa login strane
    $password = mysqli_real_escape_string($db->link, $password);
    $email    = mysqli_real_escape_string($db->link, $email);
    // $details = mysqli_real_escape_string($db->link, $details);

    if (empty($username) || empty($password) || empty($email) || empty($role)) {
        echo "<span class='error'>Field is empty</span>";
    }else{

// proveravam da li postoji već postoji mail u bazi, u supprotnom, dodajem novog korinika 
    $mailquery = "SELECT * FROM tbl_user WHERE email = '$email' LIMIT 1";
    $mailcheck = $db->select($mailquery);
        if ($mailcheck != false) {
            echo "<span class='error'>Greška. Mail već registrovan!!!</span>";
        }else{
            $query = "INSERT INTO tbl_user(username, password, email, role) VALUES('$username', '$password', '$email', '$role')";     // query za unos
            $user_insert = $db->insert($query);                      // metoda insert() Database klase
            if($user_insert){
                echo "<span class='success'>Novi Korisnik je uspešno dodat.</span>";
            }else{
                echo "<span class='error'>Greška. Korisnik nije dodat !!!</span>";
            }
        }
    }// kraj else-a    
} // kraj if-a
?>
                 <form action="adduser.php" method="POST">
                    <table class="form">                    
                        <tr>
                            <td>
                                <label>Korinicko Ime:</label>
                            </td>
                            <td>
                                <input type="text" placeholder="Enter Username..." class="medium" name="username" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Email Adresa:</label>
                            </td>
                            <td>
                                <input type="text" placeholder="Enter Valid Email..." class="medium" name="email" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Šifra:</label>
                            </td>
                            <td>
                                <input type="text" placeholder="Enter Password..." class="medium" name="password" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Pozicija:</label>
                            </td>
                            <td>
                                <select name="role">
                                    <option>Odaberi poziciju:</option>
                                    <option value="0">Admin</option>
                                    <option value="1">Author</option>
                                    <option value="2">Editor</option>
                                    <option value="3">Subscriber</option>
                                </select>
                            </td>
                        </tr>
                        <tr> 
                            <td>
                                <input type="submit" name="submit" Value="Dodaj koricnika" />
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