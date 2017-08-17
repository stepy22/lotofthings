<?php
class Database {
	public static $konekcija;
	public static function konektujSe () {
		self::$konekcija= new mysqli("localhost","root","","lineweb");//ovo je objektno
	}
}