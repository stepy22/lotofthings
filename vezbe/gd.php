<?php
//simulacija podataka za grafikon
$grafikon=array(0,5,20,50,3,15,100,35,75,120,200,0,5,20,50,3,15,100,35,75,120,100);
//mime heder
header("Content-type: image/png"); 
//kreiranje objekta slika, pozadinske i ispisne boje i bojenje pozadine
$slika = ImageCreateTrueColor(300,300); 
$pozadina = ImageColorAllocate($slika, 255, 255, 0); 
$ispis = ImageColorAllocate($slika, 0, 0, 0);
ImageFillToBorder($slika, 0, 0, $pozadina, $pozadina);
 
//pocetna tacka grafika se dodeljuje varijablama zadnjix i zadnjiy
$zadnjix=0;
$zadnjiy=0;
//petlja u kojoj kroz svaku iteraciju
for($i=0;$i<sizeof($grafikon);$i++)
{
//iscrtavanje linije od tacaka zadnjix i zadnjiy 
ImageLine($slika, $zadnjix, $zadnjiy, $i*10, $grafikon[$i], $ispis);
//varijablama zadnjix i zadnjiy se dodeljuje vrednost zavrsnih tacaka linije
$zadnjix=$i*10;
$zadnjiy=$grafikon[$i];
}
 
//FLIP SLIKE
//preuzimanje sirine i visine slike
$sx = imagesx($slika);
$sy = imagesy($slika);
//kreiranje nove privremene slike
$temp = imagecreatetruecolor($sx, $sy);
//kopiranje slike u temp sliku, ali sa negativnim vrednostima za y da bi se postigao flip
imagecopyresampled($temp, $slika, 0, 0, 0, $sy-1, $sx, $sy, $sx, 0-$sy);
//slika temp se kopira u sliku slika, ali flip-ovana
$slika = $temp;
//slika ide na izlaz
ImagePNG($slika); 
ImageDestroy($slika); 
?>
