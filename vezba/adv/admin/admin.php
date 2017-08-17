<?php
require "../config.php";
session_start();
if(isset($_SESSION['user_id'])&&isset($_SESSION['user_name'])){
	echo "Hello " . $_SESSION['user_name'];
} else {
	die("Unauthorized user");
}
$selected_article = new Article;

if(isset($_GET['aid'])){
	$selected_article = Article::GetById($_GET['aid']);
}
if(isset($_POST['btn_insert'])){
	$selected_article->title = $_POST['tb_title'];
	$selected_article->content = $_POST['ta_content'];
	$selected_article->insert();
	header("location: admin.php?aid=".$selected_article->id);
}
if(isset($_POST['btn_update'])){
	$selected_article = Article::GetById($_GET['aid']);
	$selected_article->title = $_POST['tb_title'];
	$selected_article->content = $_POST['ta_content'];
	$selected_article->update();
	header("location: admin.php?aid=".$selected_article->id);
}
if(isset($_POST['btn_delete'])){
echo ((string)$_POST['sel_article_id']);
	Article::delete($_POST['sel_article_id']);
	header("location: admin.php");
} 

$articles = Article::GetAll();
?>
<script src="../resources/js/tinymce/tinymce.min.js"></script>
<script type="text/javascript">
tinymce.init({
    selector: "textarea",
	entity_encoding:"raw",
	extended_valid_elements: "link[rel|href|type],script[language|type|src]",
    plugins: [
        "advlist autolink lists link image charmap print preview anchor",
        "searchreplace visualblocks code fullscreen",
        "insertdatetime media table contextmenu paste"
    ],
    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
});
</script>
<form action="" method="post">
<select onchange="window.location='?aid='+this.value" name="sel_article_id">
<option>Select page:</option>
<?php
foreach($articles as $article){
	echo "<option ".($selected_article->id==$article->id?"selected":"")." value='{$article->id}'>{$article->title}</option>";
}
?>
</select><br />
<input type="text" name="tb_title" value="<?php echo $selected_article->title; ?>" /><br />
<textarea name="ta_content"><?php echo $selected_article->content; ?></textarea><br />
<input type="submit" name="btn_insert" value="Add new" />
<input type="submit" name="btn_update" value="Update" />
<input type="submit" name="btn_delete" value="Delete" />
</form>
