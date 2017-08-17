<?php 

class Session{

    public static function init(){                				// otvaram sesiju init metodom!!! Session::init();

    	session_start();

    }

    public static function set($key, $val){

    	$_SESSION[$key] = $val;

    }

    public static function get($key){

    	if (isset($_SESSION[$key])) {
    		return $_SESSION[$key];
    	}else{
    		return false;
    	}

    }

    public static function checkSession(){				 // proveravam sesiju init metodom i vracam false 
    													 // ako nema sesije
    	self::init();
    	if(self::get("login") == false){
    		self::destroy();							
    		header("Location: login.php");				// i redirektujem ga na login.php
    	}
	}

    public static function checkLogin(){                // metoda checkLogin()

        self::init();
        if(self::get("login") == true){
            header("Location: index.php");
        }
    }

    public static function destroy(){                    // zatvaram sesiju i redirektujem na login.php
                                                        // za admin-a
    	session_destroy();
    	header("Location: login.php");
    }

    public static function logout(){                    // zatvaram sesiju i redirektujem na index.php
                                                        // za obicne user-e
        session_destroy();
        header("Location: index.php");
    }


} // kraj Session klase



?>