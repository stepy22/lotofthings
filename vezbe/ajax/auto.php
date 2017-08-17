<?php
if(isset($_GET['auto'])){
    $auto=$_GET['auto'];
    $automobili=array('golf','skoda','citroen','bmwwww','lada');
  

if(in_array($auto,$automobili)){
    echo "imamo ga";
}else{
    echo "nemamo taj automobil";
}
}


 ?>