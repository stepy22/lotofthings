
<html>
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php
$xml = new SimpleXMLElement("http://www.sportske.net/rss/transferi/najnovije.xml",null,true);
?>
    <form action="" method="post">
        <div id="choose" class="form-group">

        <select name="news" multiple class="form-control">
    <?php
    foreach($xml->channel->item as $vest){
        echo "<option>".$vest->title."</option>";
}
?>
    </select></div>
        <input type="submit" name="submit" value="odaberi" class="btn btn-primary">
    </form>
<div class="content">
    <?php if(isset($_POST['submit'])){
        $news=$_POST['news'];
        $vest = $xml->xpath("channel/item[title='{$news}']");
    ?>
 <?php   print_r($vest) ?>
        <div id="title"><h1><?php echo $vest[0]->title; ?> </h1></div>
            <div id="date"><h6><?php echo $vest[0]->pubDate; ?> </h6></div>
        <div id="cont">
            <?php
            echo $vest[0]->description;
            ?>
        </div>


                <?php } ?>
</div>

</body>
</html>