<?php 
$conn = new mysqli("localhost","root","","sakila"); 


if(isset($_GET['search'])){
	$search = $_GET['search'];
	$q = $conn->query("select film_id,title from film where title like '%{$search}%'"); 
	$res = []; 
	while($rw=$q->fetch_object()){
		$res[] = $rw;
	} 
} else
if(isset($_GET['id'])){
	$q = $conn->query("select * from film where film_id = ". $_GET['id']); 
	$res = $q->fetch_object();
} else { 
	$q = $conn->query("select film_id,title from film"); 
	$res = []; 
	while($rw=$q->fetch_object()){
		$res[] = $rw;
	}
}

header("Content-type: application/json");
echo json_encode($res);