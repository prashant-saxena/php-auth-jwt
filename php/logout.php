<?php
require_once('auth.class.php');
$status = Auth::logout();
echo $status;