<?php



$assignment = array(array("id","fname","lname","email"),
					array(1,"Peter", "Andersen", "peter@gmail.com" ),
					array(2,"John", "Miller", "john@gmail.com" ), 
					array(3,"Thomas", "Swift", "thomas@gmail.com")
					
					
					
);
echo "<h1>Tabela</h1>";
echo "<br>";
echo "<h4>Array ispisivanje elemenata: </h4>";
echo "<br>";
echo "<h4>Ručno ispisivanje elemenata: </h4>";

echo $assignment [0][0]."  ".$assignment [0][1]." ". $assignment [0][2]."  ". $assignment [0][3]."  "." <br> "  ;
echo $assignment [1][0]."  ".$assignment [1][1]." ". $assignment [1][2]."  ". $assignment [1][3]."  "." <br> "  ;
echo $assignment [2][0]."  ".$assignment [2][1]." ". $assignment [2][2]."  ". $assignment [2][3]."  "." <br> "  ;
echo $assignment [3][0]."  ".$assignment [3][1]." ". $assignment [3][2]."  ". $assignment [3][3]."  "." <br> "  ;

echo "<br>";
echo "<h4>Tabela: </h4>";
echo "<table >
<tr>
<th>id</th>
<th>fname</th>
<th>lname</th>
<th>email</th>
</tr>

<tr>
<td>1</td>
<td>Peter</td>
<td>Andersen</td>
<td>peter@gmail.com</td>
</tr>

<tr>
<td>2</td>
<td>John</td>
<td>Miller</td>
<td>john@gmail.com</td>
</tr>

<tr>
<td>3</td>
<td>Thomas</td>
<td>Swift</td>
<td>thomas@gmail.com</td>
</tr>
</table>";

 echo "<br>";
echo "<h4>prikazivanje vrijednosti elemenata niza: </h4>";
for ($i=0;$i<count($assignment);$i++)

{
    echo $assignment[$i][0]." ".$assignment[$i][1]." ".$assignment[$i][2]." ".$assignment[$i][3]. "<br>";

}
foreach ($assignment as $key => $array){
	foreach($array as $value){
		echo $value."<br>";
	}
}







?>

