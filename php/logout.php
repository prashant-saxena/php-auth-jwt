<?php

// remove our login session cookie
setcookie('authID', "", time() - 3600);
echo "success";