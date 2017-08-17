<?php
$users = array("richard","thomas","vule");
echo count(preg_grep("/^".$_GET['name']."$/i",$users));
