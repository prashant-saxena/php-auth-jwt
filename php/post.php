<?php
require_once('auth.class.php');
$status = Auth::login($_POST['email'], $_POST['password']);
echo json_encode(($_POST));
