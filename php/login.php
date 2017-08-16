<?php
require_once('auth.class.php');
// Sanitize your post data here
$status = Auth::login($_POST['email'], $_POST['password']);
echo $status;
