<?php



class Auth
{
	//
	public static function login($email, $password) {
		// validate your email and password from database.
		// 	If everythig is fine, set a cookie
		setrawcookie(
    				'authID', // name
    	 			'hash', // value
    	 			0, // expire
    	 			"/", // path
    	 			"", // domain
    	 			false, // secure
    	 			true // httponly
    	 			);


	}

	public static function is_logged()
	{
		if (isset($_COOKIE['authID']))
			return true;
		else
			return false;
	}


	public static function logout()
	{


	}
}