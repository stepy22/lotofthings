<?php
class simpleWidget extends Widget {
	public $title;
	public $text;
	
	static function getFromDb($id) {//ovaj metod nabavlja objekat iz baze podataka, ststic funct jer mozemo pozivati ovu metodu a da nismo napravili instancu klase
	
		$res=Database::$konekcija->query("select * from widgets where id={$id}");
		$rw=$res->fetch_object('simpleWidget');//fetch prima parametar naziv klase
		return $rw;
	}
	function show() {//moramo staviti dwostruke navodnike da bi vidio stringove kod echo a kod block jednostruke
		if (isset($_GET['Wid'])) {
			$rw=self::getFromDb($_GET['Wid']);
		}else {
			$rw=$this;
		}
		echo "<div class='block'>
		<h2>{$rw->title}</h2>
		<p>{$rw->text}</p>
		</div>";
	}
}