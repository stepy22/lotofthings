<html>
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <style>
    
    </style>
</head>
<body>
<form action"" method="post" >
<input name="prvi" type="text">
<select id="znak" name="operacija">
<option>+</option>
<option>-</option>
<option>/</option>
<option>*</option>
</select>
<input id="druga" name="drugi" type="text">
<input id="submit" name="submit" type="submit">


</form>
    <?php 
    if(isset($_POST['submit'])){
 $prvi=$_POST['prvi'];
 $drugi=$_POST['drugi'];
 $operacija=$_POST['operacija'];
 
 switch($operacija){
     case '+':
        echo $prvi + $drugi;
         break;
         case '*':
        echo $prvi * $drugi;
         break;
          case '-':
        echo $prvi - $drugi;
         break;
 }
 if($operacija == '/'){
 if($drugi != 0){echo $prvi / $drugi;}
   else{
       echo "nije moguce deliti sa nulom";
   }

    } 
    }

     ?>

</body>
</html>