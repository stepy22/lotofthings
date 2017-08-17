<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
</head>
<body>
<div id="divic">
    <a onclick="ucitaj('naslovna')" href="#">Naslovna</a>
    <a onclick="ucitaj('onama')" href="#">O nama</a>
    <a onclick="ucitaj('kontakt')" href="#">Kontakt</a>
</div>
<div id="telo">

</div>
<script>
    function ucitaj(strana){
var xhr = new XMLHttpRequest();
    xhr.open("get",strana+".php",true);
    xhr.send(null);
        document.getElementById("telo").innerHTML = "jos se nije ucitalo"
   xhr.onreadystatechange=function(){
      if(xhr.readyState==4){
           var sadrzaj = xhr.responseText;
           document.getElementById("telo").innerHTML = sadrzaj;}
   }

    }
</script>
</body>
</html>