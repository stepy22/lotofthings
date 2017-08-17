<?php

$xml = new SimpleXMLElement("http://vsp-dev.thecompletewebhosting.com/automobili/mercedes/s500.xml",null,true);

$marka=$xml->marka;
$model=$xml->model;
$slika=$xml->slika;
$cena=$xml->cena;
$godiste=$xml->godiste;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/blitzer/jquery-ui.css">
<style>
    #automobil{
        width:400px;
        height:200px;
        background: grey;
    }
    #slika img{
        float: left;
        height:100px;
        width:200px;
        margin-top: 50px;
    }
    #podatci{
        float: right;
        width:50%;
        margin: 50px auto;
    }
    #podatci td{
        width:100%;
        border: solid 1px orange;
    }
</style>
</head>
<body>

<div id="automobil">
<div id="slika">
    <img src="<?php echo $slika; ?>" alt="">
</div>
    <div id="podatci">
        <table class="table">
            <tr>
                <td>Marka:</td>
                <td><?php echo $marka; ?></td>
            </tr>
            <tr>
                <td>Model:</td>
                <td><?php echo $model; ?></td>
            </tr>
            <tr>
                <td>Godiste</td>
                <td><?php echo $godiste; ?></td>
            </tr>
            <tr>
                <td>Cena</td>
                <td><?php echo $cena; ?></td>
            </tr>
        </table>
    </div>
</div>
</body>
</html>
