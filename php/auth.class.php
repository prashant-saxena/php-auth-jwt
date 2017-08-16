<?php
require_once('jwt.php');
class Auth
{
	//
	public static function login($email, $password) {
		// Validate your email and password from database.
		// If everythig is fine, set a cookie
		$payload = array('uid'=>1);
		$jwt = create_json_web_token($payload);
		setrawcookie(
    				'authID', // name
    	 			$jwt, // value
    	 			0, // expire
    	 			"/", // path
    	 			"", // domain
    	 			false, // secure
    	 			true // httponly
    	 			);

		return $jwt;

	}

	public static function is_logged()
	{
		if (isset($_COOKIE['authID']))
			return true;
		else
			return false;
	}

	// remove our login session cookie
	public static function logout()
	{
		// make sure all the parameters matches
		setrawcookie(
			'authID', // name
 			'', // value
 			time() - 3600, // expire
 			"/", // path
 			"", // domain
 			false, // secure
 			true // httponly
    	 	);
		return true;
	}
}