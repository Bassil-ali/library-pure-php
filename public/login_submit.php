<?php session_start(); ?>
<?php 

include_once('file:///C:/wamp2/www/website/include/log/header.php');

include_once('file:///C:/wamp2/www/website/include/log/session.php');


include_once('file:///C:/wamp2/www/website/include/log/connect.php');
include_once('file:///C:/wamp2/www/website/include/log/functions.php');

 
if (empty($errors)) {



if (isset($_POST["submit"])) {
	
	
	$username =  htmlentities($_POST["username"]) ;
	$pass =  htmlentities($_POST["password"] ) ;
 
	$username1 =  mysqli_real_escape_string($conn , $username) ;
	$pass1 =  mysqli_real_escape_string($conn , $pass) ;
	
 	
	$sql = "SELECT  id, `username`,`password`  FROM `admins` WHERE `username`= '{$username1}'  LIMIT 1";
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_assoc($result);
	if ($result && mysqli_affected_rows($conn)>0) {
		
		$_SESSION['admin_id'] = $row['id'];
		$_SESSION['admin_username'] = $row['username'];
		
 	
	if (password_verify($pass1, $row['password'])) {
		
		 
		$_SESSION['msg']=login_success_msg();
		redirect ("http://localhost/website/public/admin.php");
	}else {
	 	 $_SESSION['msg']=login_fail_msg();
		redirect("http://localhost/website/public/login.php");
		 }
	 
       
 	} 
else {
	 	 $_SESSION['msg']=login_fail_msg();
		redirect("http://localhost/website/public/login.php");
		 }

}else{
redirect("http://localhost/website/public/login.php");
}
}