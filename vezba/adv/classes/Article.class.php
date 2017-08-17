<?php
class Article extends Entity
{
	public static $table = "sr_articles";
	public static $columns = array("title","content");
	public static $id_column = "id";
	public $id,$title,$content;
	
	/*
	public static function GetById($id){
		$db = Model::GetConnection();
		$res = mysqli_query($db,"select * from sr_articles where id = {$id}");
		return mysqli_fetch_object($res,"Article");
	}
	public static function GetAll(){
		$db = Model::GetConnection();
		$res = mysqli_query($db,"select * from sr_articles");
		$ret_val = array();
		while($rw = mysqli_fetch_object($res,"Article")){
			$ret_val[] = $rw;
		}
		return $ret_val;
	}
	public function insert(){
		$db = Model::GetConnection();
		mysqli_query($db,"insert into sr_articles values (null,'{$this->title}','{$this->content}')");
		$this->id = mysqli_insert_id($db);
	}
	public function update(){
		$db = Model::GetConnection();
		mysqli_query($db,"update sr_articles set title='{$this->title}',content='{$this->content}' where id = {$this->id}");
	}
	public static function delete($id){
		$db = Model::GetConnection();
		mysqli_query($db,"delete from sr_articles where id = {$id}");
	}
	*/
}