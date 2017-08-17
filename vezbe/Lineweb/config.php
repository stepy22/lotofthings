<?php
function __autoload ($nazivKlase) {//ako stavimo u parametar naziv klase i pozovemo to s echo $nazivKlase u  browseru vidimo koja klasa pravi problem tj njen naziv a ovo autoload smo napisali jer php pri instaciranju uvijek provjerava da li postoji ta funkcija i u nju stavljamo require i ovako dinamički učitavamo ono sto pravi probl na osnovu toga sta nam izbaci browser jer nema potrebe da pamtimo naziv fajla itd
	require_once "classes/{$nazivKlase}.php";
}