<?php
if(isset($_POST['btn_submit'])&&
isset($_POST['tb_name'])&&
isset($_POST['tb_password'])
){
//ovde znamo da su podaci dosli sa forme i da je ona ispravna
//ocisticemo prvo dolazne podatke kako bi eliminisali mogucnost injection-a
$username = str_replace("'","",$_POST['tb_name']);
$username = str_replace("<","",$username);
$username = str_replace(">","",$username);

$password = str_replace("'","",$_POST['tb_password']);
$password = str_replace("<","",$password);
$password = str_replace(">","",$password);

//nakon ovoga podaci su cisti od injection-a pa mozemo proveriti da li su validni stringovi ili su prazni
if(empty($username)||empty($password)){
		die("Invalid data");
} 
//ako podaci nisu prazni, mozemo izvrsiti proveru korisnika u bazi
$conn = mysqli_connect("localhost","root","","site_php_2013");
$stmt = mysqli_stmt_init($conn);
mysqli_stmt_prepare($stmt,"select user_id,user_name from sr_users where user_name = ? and user_pass = ?");
mysqli_stmt_bind_param($stmt,"ss",$username,$password);
mysqli_stmt_execute($stmt);
mysqli_stmt_bind_result($stmt,$user_id,$user_name);
if(mysqli_stmt_fetch($stmt)){
	//korisnik je ispravan u ovom trenutku, i imamo njegovo ime i id, pa mozemo postaviti sesiju
	session_start();
	$_SESSION['user_id'] = $user_id;
	$_SESSION['user_name'] = $user_name;
	echo "Welcome $user_name";
} else {
	die("Invalid user");
}


}