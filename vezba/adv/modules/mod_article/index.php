<?php
$article = Article::GetById(isset($_GET['aid'])?$_GET['aid']:1);
if(!$article){
	echo "Article does not exist";
}
echo $article->title;
echo $article->content;