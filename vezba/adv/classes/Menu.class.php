<?php
class Menu
{
	public static function GetMenu($id){
		$db=Model::GetConnection();
		$res = mysqli_query($db,"select * from sr_menuitems where menu_id = {$id}");
		$menu = array();
		while($rw=mysqli_fetch_object($res)){
			$menu[] = $rw;
		}
		return $menu;
	}
}