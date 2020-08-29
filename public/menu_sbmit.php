<?php session_start(); ?> 
<?php

include_once('file:///C:/wamp2/www/website/include/log/header.php');

include_once('file:///C:/wamp2/www/website/include/log/session.php');


include_once('file:///C:/wamp2/www/website/include/log/connect.php');
include_once('file:///C:/wamp2/www/website/include/log/functions.php');
if (isset($_POST["submit"])) {

	$menu =  checkEmpty(check_input($_POST["menu"]) ) ;
	$menu =  check_length($_POST["menu"] , 12, 4)   ;
	$optradio=  (int) $_POST["optradio"]  ;
	$rank=  (int) $_POST["rank"]  ;
	$menu2 =  mysqli_real_escape_string($conn , $menu) ;
}
	
	if (!empty($errors)) {
		
		 $_SESSION['errors']=$errors  ; 
		 redirect('http://localhost/website/public/menu_creat.php');
	}
	
	
	$sql = " INSERT INTO `website_navbar`( `item_name`, `rank`, `visible` ) VALUES
	(    '{$menu2}'    ,  '{$rank}'    ,    {$optradio}     )     ";

	if (mysqli_query($conn, $sql) && mysqli_affected_rows($conn)>0) {
		$_SESSION['msg'] = success_msg_menu();
       redirect ("http://localhost/website/public/manage_content.php");
 
	} else {
		$_SESSION['msg'] = error_msg_menu();
		redirect("http://localhost/website/public/menu_creat.php");
		 

     }
?>







    <?php

include('file:///C:/wamp2/www/website/include/log/footer.php');
?>
 