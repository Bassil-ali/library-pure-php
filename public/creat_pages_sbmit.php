<?php session_start(); ?>
<?php 

include('file:///C:/wamp2/www/website/include/log/header.php');
include_once('file:///C:/wamp2/www/website/include/log/session.php');

include_once('file:///C:/wamp2/www/website/include/log/connect.php');
include_once('file:///C:/wamp2/www/website/include/log/functions.php');
  
login_check ();
 

if (isset($_POST["submit"])) {
	
	$id = $_SESSION['id'];
	$page =  checkEmptyPage(check_input($_POST["page"]) ) ;
	$optradio=  (int) $_POST["optradio"]  ;   //visible
	$optradio1=  (int) $_POST["optradio1"]  ;    //status
	$rank=  (int) $_POST["rank"]  ;
	$content =   check_content($_POST["content"])   ;
	$page2 =  mysqli_real_escape_string($conn , $page) ;
	$content =  mysqli_real_escape_string($conn , $content) ;
	
// 	echo    $id .    " id<br> ";
// 	echo    $page2 .    "page2<br>";
// 	echo    $optradio .    "optradio<br>";
// 	echo    $optradio1 .    "optradio1<br>";
// 	echo    $rank .    "rank<br>";
// 	echo    $content .    "content<br>";

	if (!empty($errors)) {
		
		 $_SESSION['errors']=$errors  ; 
		 redirect('http://localhost/website/public/create_page.php');
	}
	
	
 
	
	$sql = " INSERT INTO `pages`( `item_name_id`, `page_name`, `content`, `rank`, `visible`, `status` ) VALUES
	(  {$id} ,   '{$page2}'  , '{$content}'  ,  '{$rank}'    ,    {$optradio} , {$optradio1}    )     ";

	if (mysqli_query($conn, $sql) && mysqli_affected_rows($conn)>0) {
		 $_SESSION['msg']=success_msg_menu();
       redirect ("http://localhost/website/public/manage_content.php");
 
	} else {
	 	 $_SESSION['msg']=error_msg_menu();
		redirect("http://localhost/website/public/create_page.php");
		 }

}else{
redirect("http://localhost/website/public/create_page.php");
}



 




