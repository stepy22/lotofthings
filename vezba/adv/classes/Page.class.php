<?php
class Page
{
	public static function GetById($id){
		$db = Model::GetConnection();
		$res = mysqli_query($db,"select * from sr_pages where id = {$id}");
		$new_page = mysqli_fetch_object($res,"Page");
		if($new_page)
			$new_page->modules_arr = explode(",",$new_page->modules);
		return $new_page;
	}
	public function Render(){
		
	}
}