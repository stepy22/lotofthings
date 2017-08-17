
<?php
$niz = array();
$niz[0] = array(1, "Vukasin", "Petrovic", "vukasin123@gmail.com", "22");
$niz[1] = array(2, "Dragan", "Karic", "ehbla@gmail.com", "25");
$niz[2] = array(3, "Svetlana", "Mihajlov", "mail@mail.com","40");
$niz[3] = array(4, "Milica", "gordic", "comili@mail.com", "19");
echo "<table border='1px;'>";
echo "<tr>";
echo "<th>ID</th>";
echo "<th>Ime</th>";
echo "<th>Prezime</th>";
echo "<th>E-Mail</th>";
echo "<th>Godine</th>";

echo"</tr>";



for($i=0; $i<count($niz); $i++){

    echo"<tr>";
    echo "<td>". $niz[$i][0] . "</td><td> " . $niz[$i][1] . "</td><td>  " . $niz[$i][2] . "</td><td>  " . $niz[$i][3] ."</td><td>" . $niz[$i][4] . "<br>";
    echo "</tr>";

}
echo "</table>";


?>





