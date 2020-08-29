<?php session_start(); ?> 
<?php

include('file:///C:/wamp2/www/website/include/log/header.php');
include_once('file:///C:/wamp2/www/website/include/log/session.php');

include_once('file:///C:/wamp2/www/website/include/log/connect.php');
include_once('file:///C:/wamp2/www/website/include/log/functions.php');
  

login_check ();

$ge = "SELECT * FROM `website_navbar` WHERE 1";
$re = mysqli_query($conn,$ge);

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
<style >
ul{
  list-style: none;
}  
</style>
  <body>
     <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand"  href='http://localhost/website/public/admin.php#'>cms</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <?php
              if (mysqli_num_rows($re)>0) {
  while ($row = mysqli_fetch_assoc($re)){
      echo "<li> ". "<a>" . $row["item_name"]. "</a>" ."</li>";
  }
  
}


               
             ?>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">man <span class="caret"></span></a>
              <ul class="dropdown-menu">
           <li class="active">

               <?php 
$ge = "SELECT * FROM `website_navbar` WHERE visible=1";
$re = mysqli_query($conn, $ge);
if (mysqli_num_rows($re) > 0) {

          while($row = mysqli_fetch_assoc($re)) {
           ?>

<li class="active" ><a href="http://localhost/website/public/manage_content.php#?menu=<?php echo   $row["id"];  ?>"> <h3><?php echo   $row["item_name"];  ?></h3> </a></li>

             <?php 
$query1 = "SELECT * FROM `pages`  WHERE visible=1 AND `pages`.`item_name_id`= ".$row["id"];
$result1 = mysqli_query($conn, $query1);
if (mysqli_num_rows($result1) > 0) {

          while($row1 = mysqli_fetch_assoc($result1)) {
           ?>
 <ul  >
               
            <li><a href="http://localhost/website/public/manage_content.php#?page=<?php echo   $row1["id"];  ?>"> <?php echo   $row1["page_name"];  ?>  </a></li>
           
             
              </ul>
<?php
          }
          }
 
          
          ?>


</li>

<?php
          }
          }

          
          ?>

                
              </ul>
            </li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
 <div class="container theme-showcase" role="main">
  <div class="jumbotron">
        <h1>creat pages</h1>
        <p>click on anything to creat pages</p>

       
      </div>
    </div>
 

   <div class="container">
  <div class="row">
    <div class="col-sm-2">
    
    
</div>
    <div class="col-sm-10">
<?php  echo   msg(); ?> 
<?php  $errors = err(); ?> 
<?php  error_function($errors); ?> 
    
</div>
</div>
</div>



  <div class="container">
  <div class="row">
    <div class="col-sm-2">

<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
  
  
  
  <?php 
$ge = "SELECT * FROM `website_navbar`  ";
$re = mysqli_query($conn, $ge);
if (mysqli_num_rows($re) > 0) {
 while($row = mysqli_fetch_assoc($re)) {
?>
  
  
  
  
  
  
  <div class="panel panel-info">
    <div class="panel-heading" role="tab" id="headingOne">
      <h4 class="panel-title">
        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne<?php   echo   mysqli_real_escape_string($conn,$row["id"]);   ?>"  aria-controls="collapseOne">
          <?php echo mysqli_real_escape_string($conn,$row["item_name"])   . "  ". " ("  .  mysqli_real_escape_string($conn,$row["id"])  . ")"  ;  ?>
        </a>
      </h4>
    </div>
    <div id="collapseOne<?php echo   $row["id"];  ?>" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
      <div class="panel-body">

<a href="http://localhost/website/public/creat_pages.php?menu=<?php echo   mysqli_real_escape_string($conn,$row["id"]);   ?> "><h4><?php echo   mysqli_real_escape_string($conn,$row["item_name"]) ;  ?></h4> </a>
 
 <?php 
$query1 = "SELECT * FROM `pages`  WHERE   `pages`.`item_name_id`= ".$row["id"];
$result1 = mysqli_query($conn, $query1);
$row_cnt = mysqli_num_rows($result1);
  
?>

<ul   >
<li> <h5>
<?php     if ($row_cnt ==0) { echo "No pages"	; }   elseif($row_cnt ==1) {echo "page : " .$row_cnt;}else {echo "pages : " .$row_cnt;}  ?> 
</h5> </li>
</ul>

<?php
 
   ?>
 
</li>
      </div>
    </div>
  </div>
   <?php
  }  }
  
  ?>
   
   
   
   
   
</div>
</div>

<div class="col-sm-10">
   
 <div class="panel panel-danger">
  <div class="panel-heading">Create new Page</div>
  <div class="panel-body">

  <form method="post" action="http://localhost/website/public/creat_pages_sbmit.php">
  <div class="form-group">
  <label for="text">Page name:</label>
  <div class="input-group">
    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
    <input id="text" type="text" class="form-control" name="page" placeholder="page name">
  </div>
  </div>
 
  <div class="form-group">
<div class="radio">
  <label for="text">Visible : </label>
  <label><input type="radio" name="optradio" value="1">Yes</label>
 
  <label><input type="radio" name="optradio"  value="0">No</label>
</div>
  </div>
  
  <div class="form-group">
<div class="radio">
  <label for="text">Status : </label>
  <label><input type="radio" name="optradio1" value="1">Yes</label>
 
  <label><input type="radio" name="optradio1"  value="0">No</label>
</div>
  </div>
 
  <div class="form-group">
  <label for="sel1">Rank : </label>
  <select class="form-control" id="sel1" name="rank">
  
    <?php 
$ge = "SELECT `rank` FROM `pages` WHERE `item_name_id`   =".$menu_id_selcted;
$re = mysqli_query($conn, $ge);
$row_cnt = mysqli_num_rows($re);
 
 for ($i =1; $i <= $row_cnt+1 ; $i++) {
	

?>
   
<option  value="<?php  echo $i ; ?>">  <?php  echo $i ; ?>  </option>
 
 
 <?php    } ?>
    

  </select>
</div>
 
  <div class="form-group">
  <label for="comment">Content:</label>
  <textarea class="form-control" rows="5" name="content"></textarea>
</div>
   
  <button type="submit" class="btn btn-default" name="submit" data-toggle="modal" data-target="#myModal">Submit</button>
</form>




  </div>
</div>
  
  
  

</div>


</div>
</div>


 









 
          
        
  


    <?php

include('file:///C:/wamp2/www/website/include/log/footer.php');
?>