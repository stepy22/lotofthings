<?php
class Strana {
	public $center=array();
	public $sidebar=array();
	public static function getStrana($id) {
		$res=Database::$konekcija->query("select * from strane where id={$id}");
		$widgeti=$res->fetch_object();
		$widgeti=$widgeti->widgeti;
//"simpleWidget,simpleWidget,GalerijaWidget,GalerijaWidget|GalerijaWidget";
$deloviStrane=explode("|",$widgeti);
$center=explode (",",$deloviStrane[0]);//stavili smo rw sto znaci da ovo sto smo uzeli iz baze smjestamo u rw
$sidebar=explode (",",$deloviStrane[1]);//napravili niz koji kasnije pozivamo gdeje treba kroz foreach
	$res=new Strana;
	$res->center=$center;
	$res->sidebar=$sidebar;
	return $res;
	
}}