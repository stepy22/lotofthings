<?php
class Model {
	const DBUSER = "root";
	const DBPASS = "";
	const DBHOST = "localhost";
	const DB = "adv";
	public static $conn = null;
	public static function GetConnection(){
		if(!self::$conn){
			self::$conn = @mysqli_connect(self::DBHOST,self::DBUSER,self::DBPASS,self::DB);
		} 
		return self::$conn;
	}
	
	/*
	public $conn = null;
	public function Connect(){
		$conn = @mysqli_connect(self::DBHOST,self::DBUSER,self::DBPASS,self::DB);
		if(mysqli_connect_error($conn)){
			die("Error connecting database");
		}
		$this->conn = $conn;
	}
	
	public function GetPages(){
		$pages = array();
		$query_result = mysqli_query($this->conn,"select * from sr_pages");
		while($rw = mysqli_fetch_assoc($query_result)){
			$pages[(string)$rw['id']] = array('name'=>$rw['name'],'document'=>$rw['document']);
		} 
		return $pages;
	}
	
	public function UpdateContent($selected_page_id,$new_title,$new_content){
		mysqli_query($this->conn,"update sr_pages set name='{$new_title}',document='{$new_content}' where id = {$selected_page_id}");
	}
	
	public function DeleteContent($selected_page_id){
		mysqli_query($this->conn,"delete from sr_pages where id = {$selected_page_id}");
	}
	
	public function InsertContent($new_title,$new_content){
		mysqli_query($this->conn,"insert into sr_pages values (null,'{$new_title}','{$new_content}')");
		$new_id = mysqli_insert_id($this->conn);
		return $new_id;
	}
	*/
}