<html>
<head></head>
<body>
<a onclick="ucitaj('naslovna.php')" href="javascript:void(0)">Naslovna</a> 
<a onclick="ucitaj('onama.php')" href="javascript:void(0)">O nama</a> 
<a onclick="ucitaj('kontakt.php')" href="javascript:void(0)">Kontakt</a> 
<a onclick="loadMovies()" href="javascript:void(0)">Movies</a><br /> 
<div id="strana"> 
</div>
</body>
</html> 
<script> 

function loadDetails(id){
	var xhr = new XMLHttpRequest();
	xhr.onreadystatechange = function(){
		if(xhr.readyState == 4){
			var podaci = eval("(" + xhr.responseText + ")");
			var izlaz = "";
			izlaz = "<h3>"+podaci.title+"</h3>";
			izlaz += "<p>" + podaci.description + "</p>";
			document.getElementById("strana").innerHTML = izlaz;
		}
	}
	xhr.open("get","movies.php?id="+id,true);
	xhr.send(null);
}

function loadMovies(){
	var strana = document.getElementById("strana");
	strana.innerHTML = "";
	var xhr = new XMLHttpRequest();
	xhr.onreadystatechange = function(){
		if(xhr.readyState==4&&xhr.status == 200){
			var podaci = JSON.parse(xhr.responseText); 
			strana.innerHTML = "<ul>";
			for(var i=0;i<podaci.length;i++){
				strana.innerHTML += "<li onclick='loadDetails("+podaci[i].film_id+")'>"+podaci[i].title+"</li>";
			}
			strana.innerHTML += "</ul>";
		}
	}
	xhr.open("get","movies.php",true);
	xhr.send(null);
}


var xhr = new XMLHttpRequest(); 
xhr.onreadystatechange = function(){
		if(this.readyState == 4){
			var dobijeniSadrzaj = this.responseText;
			document.getElementById("strana").innerHTML = dobijeniSadrzaj; 
		}
}

function ucitaj(strana){ 
	xhr.open("get",strana,true);
	xhr.send(null); 
}

</script>