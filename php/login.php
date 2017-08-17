<?php
header('Access-Control-Allow-Origin: ' . $_SERVER['SERVER_NAME']);
header('Content-Type: application/json; charset=UTF-8');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Max-Age: 3600');
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

require_once('auth.class.php');
// Sanitize your post data here
$status = Auth::login($_POST['email'], $_POST['password']);
echo json_encode(array('status'=>$status));
