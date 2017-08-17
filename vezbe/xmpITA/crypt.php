<?php
echo crypt('test','$1$bilosta') . "<br>";
echo crypt('test','$2$bilosta') . "<br>"; 
echo CRYPT_SALT_LENGTH . "<br>"; //Proveru aktuelnog crypt algoritma možemo proveriti konstantom CRYPT_SALT_LENGTH:
echo md5("petar") . "<br>";
echo md5("petar", true). "<br>";//binarni oblik
echo sha1("petar")." sha1<br>";
echo hash("sha256","petar")." sha256<br>";
echo hash("sha384","petar")." sha384<br>";
echo hash("sha512","petar")." SHA512<br>";
echo sha1("petar",true);
echo "<br>";
print_r(hash_algos());//lista svih algoritama



 ?>