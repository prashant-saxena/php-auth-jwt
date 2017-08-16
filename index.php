<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once('php/auth.class.php');
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Auth</title>
    
    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="css/bulma.min.css">
    <script type='text/javascript' src="js/jquery-3.2.1.min.js"></script>
    
    <!--[if lt IE 9]>
        <script src="js/html5-3.6-respond-1.4.2.min.js"></script>
    <![endif]-->

  </head>
    <body>
      <!--[if lt IE 8]>
          <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
      <![endif]-->

      <?php
        if (!Auth::is_logged()) {
          require_once('template/login.html');
        } else {
          require_once('template/admin.html');
        }
      ?>
              
    </body>
</html>