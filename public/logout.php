<?php session_start(); ?>
<?php 
include_once('file:///C:/wamp2/www/website/include/log/session.php');

include_once('file:///C:/wamp2/www/website/include/log/functions.php');



$_SESSION['admin_id'] = null;
$_SESSION['admin_username'] = null;

redirect("http://localhost/website/public/login.php");

?>