<?php

require '../portal/loggedin.php';
session_destroy();

#to move back to the login page or index page with the login options or member deashboard
#where we will say you have to login to see whats inside.

header('Location:'.$http_referer);





?>