<?php session_start(); ?> 
<?php

include_once('file:///C:/wamp2/www/website/include/log/header.php');

include_once('file:///C:/wamp2/www/website/include/log/session.php');


include_once('file:///C:/wamp2/www/website/include/log/connect.php');
include_once('file:///C:/wamp2/www/website/include/log/functions.php');


if (isset($_POST["submit"])) {
	
	$id = $_SESSION['id'];
	$page =  checkEmptyPage(check_input($_POST["page"]) ) ;
	$optradio=  (int) $_POST["optradio"]  ;   //visible
	$optradio1=  (int) $_POST["optradio1"]  ;    //status
	$checkbox=  (int) $_POST["checkbox"]  ;    //item_menu_id
	$rank=  (int) $_POST["rank"]  ;
	$content =   check_content($_POST["content"])   ;
	$page2 =  mysqli_real_escape_string($conn , $page) ;
	$content =  mysqli_real_escape_string($conn , $content) ;

	
	
	

	if (!empty($errors)) {
		
		 $_SESSION['errors']=$errors  ; 
		 redirect('http://localhost/website/public/edit_menu.php');
	}
 
	
	$sql = "UPDATE `pages` SET  `item_name_id`={$checkbox},`page_name`='{$page2}',
		 		`content`='{$content}',`rank`={$rank},`visible`={$optradio},`status`={$optradio1}   WHERE id={$id} ";
 
	if (mysqli_query($conn, $sql) && mysqli_affected_rows($conn)>0) {
		 $_SESSION['msg']=success_msg_menu();
       redirect ("http://localhost/website/public/manage_content.php");
 
	} else {
	 	 $_SESSION['msg']=error_msg_menu();
		redirect("http://localhost/website/public/edit_menu.php");
		 }

}else{
redirect("http://localhost/website/public/edit_menu.php");
}

?>

    <?php

include('file:///C:/wamp2/www/website/include/log/footer.php');
?>
