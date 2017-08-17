<?php
$conn=mysqli_connect("localhost", "root","", "notes");

if(mysqli_connect_error()){
        echo mysqli_connect_error();

    die("nema konsssssekcija ka bazi");
}
?>