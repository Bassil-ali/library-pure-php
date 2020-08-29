<?php session_start(); ?>
<?php 

include('file:///C:/wamp2/www/website/include/log/header.php');
include_once('file:///C:/wamp2/www/website/include/log/session.php');

include_once('file:///C:/wamp2/www/website/include/log/connect.php');
include_once('file:///C:/wamp2/www/website/include/log/functions.php');
  

 login_check ();


if (isset($_POST["submit"])) {
	
 
	$fname =  mysqli_real_escape_string($conn,checkEmptyPage(check_input($_POST["fname"]) ))  ;
	$lname =  mysqli_real_escape_string($conn,checkEmptyPage(check_input($_POST["lname"]) ))  ;
	$uname =  mysqli_real_escape_string($conn,checkEmptyPage(check_input_admin($_POST["username"]) ))  ;
	$pwd =  mysqli_real_escape_string($conn,checkEmptyPage(check_input_admin($_POST["pwd"]) ))  ;
	$email =  mysqli_real_escape_string($conn,checkEmptyPage(check_input_admin($_POST["email"]) ))  ;
 
	$pwd1 = password_hash($pwd ,PASSWORD_BCRYPT);

	if (!empty($errors)) {
		
		 $_SESSION['errors']=$errors  ; 
		 redirect('http://localhost/website/public/admins_manage.php');
	} 
	
 	$sql = "INSERT INTO `admins`( `username`, `password`, `firstname`, `lastname`, `email` ) VALUES
 	(  '{$uname}' ,   '{$pwd1}'  , '{$fname}'  ,  '{$lname}'    ,    '{$email}'    )     ";
 
 	if (mysqli_query($conn, $sql) && mysqli_affected_rows($conn)>0) {
		 $_SESSION['msg']=success_msg_admin();
       redirect ("http://localhost/website/public/admins_manage.php");
 
	} else {
	 	 $_SESSION['msg']=fail_msg_admin();
		redirect("http://localhost/website/public/admins_manage.php");
		 }

}else{
redirect("http://localhost/website/public/admins_manage.php");
}
