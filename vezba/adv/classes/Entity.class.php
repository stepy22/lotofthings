<?php
abstract class Entity
{
	public static $table = "";
	public static $columns = array();
	public static $id_column = "";
	
	public static function GetById($id){
		$db = Model::GetConnection();
		$res = mysqli_query($db,"select * from ".static::$table." where ".static::$id_column." = {$id}");
		return mysqli_fetch_object($res,get_called_class());
	}
	public static function GetAll(){
		$db = Model::GetConnection();
		$res = mysqli_query($db,"select * from ".static::$table);
		$ret_val = array();
		while($rw = mysqli_fetch_object($res,get_called_class())){
			$ret_val[] = $rw;
		}
		return $ret_val;
	}
	public function insert(){
		$db = Model::GetConnection();
		$columns_string = implode(",",static::$columns);
		$fields_arr = array();
		foreach(static::$columns as $field){
			$fields_arr[$field] = $this->$field;
		}
		$field_values_string = "'" . implode("','",$fields_arr)."'";
		mysqli_query($db,"insert into ".static::$table." ({$columns_string}) values ({$field_values_string})");
		echo "insert into ".static::$table." ({$columns_string}) values ({$field_values_string})";
		$this->id = mysqli_insert_id($db);
	}
	public function update(){
		$db = Model::GetConnection();
		$fields_arr = array();
		foreach(static::$columns as $field){
			$fields_arr[] = $field."='".$this->$field."'";
		}
		$fields_update_string = implode(",",$fields_arr);
		$id_column = static::$id_column;
		mysqli_query($db,"update sr_articles set {$fields_update_string} where ".$id_column." = ".$this->$id_column); 
	}
	public static function delete($id){
		$db = Model::GetConnection(); 
		mysqli_query($db,"delete from ".static::$table." where ".static::$id_column." = {$id}"); 
	}
}