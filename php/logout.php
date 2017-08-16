<?php
// remove our login session cookie
setrawcookie(
			'authID', // name
 			'', // value
 			time() - 3600, // expire
 			"/", // path
 			"", // domain
 			false, // secure
 			true // httponly
    	 	);
echo "success";