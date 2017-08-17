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
    	 			'/', // path
    	 			'', // domain
    	 			false, // secure
    	 			true // httponly
    	 			);

		return $jwt;

	}

	public static function is_logged()
	{
		// If cookie is not set, return false.
		if (!isset($_COOKIE['authID']))
			return false;

		$payload = validate_json_web_token($_COOKIE['authID']);
		
		// if $payload is false, then something wrong
		if($payload == false) {
			return false;
		}

		if(!is_array($payload))
			return false;

		if(!array_key_exists('exp', $payload))
			return false;

		if(!array_key_exists('iss', $payload))
			return false;

		if($payload['iss'] != $_SERVER['SERVER_NAME'])
			return false;

		date_default_timezone_set('Asia/Calcutta');
		// Time expired
		if(date("m/d/Y H:i:s") > date('m/d/Y H:i:s', $payload['exp']))
			return false;
		

		return true;
	}

	// remove our login session cookie
	public static function logout()
	{
		// make sure all the parameters matches
		setrawcookie(
			'authID', // name
 			'', // value
 			time() - 3600, // expire
 			'/', // path
 			'', // domain
 			false, // secure
 			true // httponly
    	 	);
		return true;
	}
}