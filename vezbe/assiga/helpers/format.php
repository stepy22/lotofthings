<?php

class Format {

    // format date metoda	
	public function formatDate($date){                        // date iz baze, tabela posts

		return date('F j, Y, g:i a', strtotime($date));

	}

	// readMoreShort metoda
	public function readMoreShort($text, $limit = 400){        // body iz baze, tabela posts

		$text = $text. " ";
		$text = substr($text, 0, $limit);
		// $text = substr($text, 0, strrchr($text, ""));       // ceo string
		$text = $text."....";
		return $text;

	}

	// Validation metoda
	public function validation($data){                          // validacija podataka

		$data = trim($data);
		$data = stripcslashes($data);
		$data = htmlspecialchars($data);
		return $data;

	}

	// Title metoda
	public function title(){                             // malo lickanja <title> :)

		$path  = $_SERVER['SCRIPT_FILENAME'];
		$title = basename($path, '.php');
		$title = str_replace('_', ' ', $title);       // ako ima _ u imenu fajla, izbacujem je i ostavljam ' '
		if ($title == 'index'){
			$title = 'home';

		}elseif($title == 'contact'){
			$title = 'contact';
		}

		return $title = ucwords($title);   // za ucwords() podseti se na phpnet
	}










}



?>