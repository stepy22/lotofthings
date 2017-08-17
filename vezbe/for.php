<head> <style>
        .rezultat{
            width:500px;
            height:50px;
            display: inline;
        }
        .tacno{
            width:40px;
            height:40px;
            display: inline;

        }
        .tacno img{
            width:40px;
            height:40px;
            display:inline;
            margin:2px;
        }


    </style></head>

<?php


if(sad() === true){
	sad().stop();
beAwesome();}



if(isset($_POST['submit'])) {
    $userchart1 = $_POST['userchart1'];
    $userchart2 = $_POST['userchart2'];
    $userchart3 = $_POST['userchart3'];
    $userchart4 = $_POST['userchart4'];

    if ($userchart1 != null && $userchart2 != null && $userchart3 != null && $userchart4 != null) {

        $aichart1 = rand(1, 6);
        $aichart2 = rand(1, 6);
        $aichart3 = rand(1, 6);
        $aichart4 = rand(1, 6);

        $pogodci = 0;
        $pogodci_broj=0;

        switch($userchart1){
            case $aichart1;
                $pogodci++;
                $pogodci_broj++;
                $debug1=true;
                break;
            case $aichart2;
                $debug2=true;
              $pogodci_broj++;
                 break;
            case $aichart3;
                $debug3=true;
                $pogodci_broj++;
                break;
            case $aichart4;
                $debug4=true;
                $pogodci_broj++;
                break;


        }

        switch($userchart2){
            case $aichart1;
                if(!isset($debug1)) {
                    $debug1 = true;
                    $pogodci_broj++;
                }
                break;
            case $aichart2;
                $pogodci++;
                $pogodci_broj++;
                $debug2=true;


                break;
            case $aichart3;
                if(!isset($debug3)) {
                    $pogodci_broj++;
                    $debug3 = true;
                }
                break;
            case $aichart4;
                if(!isset($debug4)) {
                    $pogodci_broj++;
                    $debug4 = true;
                }
                break;


        }
        switch($userchart3){
            case $aichart1;
                if(!isset($debug1)) {
                    $pogodci_broj++;
                    $debug1 = true;
                }
                break;
            case $aichart2;
                if(!isset($debug2)) {
                    $pogodci_broj++;
                    $debug2 = true;
                }
                break;
            case $aichart3;

                    $pogodci++;
                $pogodci_broj++;
                $debug3 = true;

                break;
            case $aichart4;
                if(!isset($debug4)) {
                    $pogodci_broj++;
                    $debug4 = true;
                }

                break;


        }
        switch($userchart4){
            case $aichart4;

                $pogodci++;
                $pogodci_broj++;

                $debug4 = true;

                break;
            case $aichart2;
        if(!isset($debug2)) {
            $pogodci_broj++;
            $debug2 = true;
        }
                break;
            case $aichart3;
        if(!isset($debug3)) {
            $pogodci_broj++;
            $debug3 = true;
        }
                break;
            case $aichart1;
        if(!isset($debug1)) {
            $debug1 = true;
            $pogodci_broj++;
        }
                break;


        }








              echo
              $aichart1 . $userchart1 . "<br>" . $aichart2 . $userchart2 . "<br>" . $aichart3 . $userchart3 . "<br>" . $aichart4 . $userchart4 . "<br>";

        if($pogodci>=1){ $boja1="crveno.jpg";} else{if($pogodci_broj>=1){$boja1="zuto.jpg";}else{ $boja1="crno.png";} }
        if($pogodci>=2){ $boja2="crveno.jpg";} else{if($pogodci_broj>=2){$boja2="zuto.jpg";}else{ $boja2="crno.png";} }
        if($pogodci>=3){ $boja3="crveno.jpg";} else{if($pogodci_broj>=3){$boja3="zuto.jpg";}else{ $boja3="crno.png";} }
        if($pogodci>=4){ $boja4="crveno.jpg";} else{if($pogodci_broj>=4){$boja4="zuto.jpg";}else{ $boja4="crno.png";} }
        echo $pogodci_broj . " su pogodjena " . $pogodci . " su na pravom mestu";;

echo"<div class='rezultat'>";
echo "<div class='tacno'> <img src='$boja1' alt='image'></div>";
 echo "<div class='tacno'> <img src='$boja2' alt='image'></div>";
        echo "<div class='tacno'> <img src='$boja3' alt='image'></div>";
        echo "<div class='tacno'> <img src='$boja4' alt='image'></div>";

 echo "</div>";








    } else {
        echo "niste uneli sva polja";
        $greska=true;
    }
}
?>

<?php if(!isset($_POST['submit']) || $greska=true) { $pogodci=0; $boja="crno.png"; } ?>














<form action='for.php' method='POST'>
  <input type= 'text' name='userchart1'/>
  <input type= 'text' name='userchart2'/>
  <input type= 'text' name='userchart3'/>
  <input type= 'text' name='userchart4'/>


  <input type="submit" value="Konvertuj" name="submit" />

</form>