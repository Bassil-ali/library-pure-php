<?php session_start(); ?> 
<?php

include_once('file:///C:/wamp2/www/website/include/log/header.php');

include_once('file:///C:/wamp2/www/website/include/log/session.php');


include_once('file:///C:/wamp2/www/website/include/log/connect.php');
include_once('file:///C:/wamp2/www/website/include/log/functions.php');
login_check ();

$id_menu = mysqli_real_escape_string($conn , $_GET["page"]);
 

	$id1=  (int) $id_menu  ;
 
	if (!empty($errors)) {
		
		 $_SESSION['errors']=$errors  ; 
		 redirect('delete_menu.php');
	}
 
	$sql = "DELETE FROM `pages`  WHERE id= {$id1} LIMIT 1";
	
	
	
	$result = mysqli_query($conn, $sql);
	if ($result && mysqli_affected_rows($conn)>0) {
		
		$_SESSION['msg']=success_delete_msg_menu();
       redirect ("http://localhost/website/public/manage_content.php");
 
	} else {
	 	 $_SESSION['msg']=fail_delete_msg_menu();
		redirect("http://localhost/website/public/delete_menu.php");
		 }
 
	