<?php
class User
{
 private $id;
 private $first_name;
 private $last_name;
 private $age;

 function __construct($id,$first_name,$last_name,$age)
 {
   $this->age = $age;
   $this->id = $id;
   $this->first_name = $first_name;
   $this->last_name = $last_name;
   
 }

 public function Username()
 {
   return "Ime: ".$this->first_name."<br>"."Prezime: ".$this->last_name."<br>";
 }

 public function Age()
 {
   if ($this->age >= 18) {
           return TRUE;
      } else {
          return FALSE;
        }
 }
}

$korisnik= new User(1,"Vukasin","Petrovic","22");
echo $korisnik->Username();
if ($korisnik->Age()==TRUE){
 echo "Mozete se ulogovati";
}
else {
 echo "Korisnik je maloletan!";
}