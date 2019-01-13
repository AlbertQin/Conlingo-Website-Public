<?php
session_start();
$_SESSION['email'] = null;
session_destroy();
header("Location: login.php");//use for the redirection to some page  
exit();

?>