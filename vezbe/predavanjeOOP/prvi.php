<?php
class widget{
    public $slika;
    public $link;
    function render(){
        echo "<img src='{$this->slika}'><a href=''>Link do sajta</a>";
    }
}
$w = new widget;
$w->slika = "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQHXqNKgiGd6wIepEAQQQuN-gy8A5jkUyCEGPe9C_Iy9MgObyGa";
$w->link = "http://www.google.com";
$w->render();


