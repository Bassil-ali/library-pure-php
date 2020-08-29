<?php session_start(); ?>
<?php
include_once('file:///C:/wamp2/www/website/include/log/public_theme/header.php');
//include('file:///C:/wamp2/www/website/include/log/header.php');
include_once('file:///C:/wamp2/www/website/include/log/session.php');

include_once('file:///C:/wamp2/www/website/include/log/connect.php');
include_once('file:///C:/wamp2/www/website/include/log/functions.php');
  

login_check ();


if(isset($_GET["menu"])){
  $menu_id_selcted =$_GET["menu"];
    $page_id_selcted = null;
}elseif (isset($_GET["page"])) {
  $page_id_selcted = $_GET["page"];
  $menu_id_selcted = null;
}else{
 $menu_id_selcted = null;
    $page_id_selcted = null;
  }

?>




 <div class="container theme-showcase" role="main">
  <div class="jumbotron">
        <h1>welocme  <?php echo $_SESSION['admin_username']?>!</h1>
        <p>welcome <?php echo $_SESSION['admin_username']?> to control panal</p>

        <p>
   
           <a type='button'class= 'btn btn-lg btn-info' href='http://localhost/website/public/manage_content.php#'>mange_contect</a>
            <a type='button'class= 'btn btn-lg btn-primary' href='http://localhost/website/public/admins_manage.php'>admins</a>
             <a type='button'class= 'btn btn-lg btn-success' href="http://localhost/website/public/log.php">logout</a>
           
        </p>
      </div>
    </div>
 

 <?php

include('file:///C:/wamp2/www/website/include/log/footer.php');
?>
