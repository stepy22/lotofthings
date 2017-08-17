<?php
require_once "config.php";
//Article::delete(5); 

//$e = Article::GetAll();
$a = new Article;
$a->id = 4;
$a->title = "proba entity";
$a->content = "1234";
$a->update();

print_r($a);