<?phpinclude "conn.php";session_start();if(!isset($_GET['email']) || !isset($_GET['key'])){    echo '<div class="alert alert-danger">Kliknite na aktivacioni link</div>';}else{    $email=$_GET['email'];    $key=$_GET['key'];    $email=mysqli_real_escape_string($conn,$email);    $key=mysqli_real_escape_string($conn,$key);    $sql = "UPDATE users SET activation='activated' WHERE (email='$email' AND activation='$key') LIMIT 1";$result=mysqli_query($conn,$sql);    if(mysqli_affected_rows($conn)== 1){        echo '<div class="alert alert-success">Vas account je aktiviran </div>';        echo '<a href="index.php" type="button" class="btn-lg btn-success">Login </a>';    }else{        echo '<div class="alert alert-danger">Greska</div>';    }}?>