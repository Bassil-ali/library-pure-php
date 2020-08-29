<?php if (!isset($_SESSION)) {
  session_start();
}  ?>
<?php 

include('file:///C:/wamp2/www/website/include/log/header.php');
include_once('file:///C:/wamp2/www/website/include/log/session.php');

include_once('file:///C:/wamp2/www/website/include/log/connect.php');
include_once('file:///C:/wamp2/www/website/include/log/functions.php');
  
login_check ();

if (isset($_GET["menu"])) {
  $menu_id_selected = $_GET["menu"];
  $page_id_selected = null;
   
}elseif (isset($_GET["page"])){
  $page_id_selected = $_GET["page"];
  $menu_id_selected = null;
  
}else{
  $menu_id_selected = null;
  $page_id_selected = null;
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
$query = "SELECT * FROM `website_navbar` WHERE visible=1";
$re = mysqli_query($conn, $query);
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
$query = "SELECT * FROM `website_navbar` WHERE visible=1";
$re = mysqli_query($conn, $query);
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
        <h1>delete menu and pages</h1>
        <p>welcome to delete content</p>

       
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
$query = "SELECT * FROM `website_navbar`  ";
$result = mysqli_query($conn, $query);
if (mysqli_num_rows($result) > 0) {
 while($row = mysqli_fetch_assoc($result)) {
?>
  
  
  
  
  
  
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingOne">
      <h4 class="panel-title">
        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne<?php   echo   mysqli_real_escape_string($conn,$row["id"]);   ?>"  aria-controls="collapseOne">
          <?php echo mysqli_real_escape_string($conn,$row["item_name"])   . "  ". " ("  .  mysqli_real_escape_string($conn,$row["id"])  . ")"  ;  ?>
        </a>
      </h4>
    </div>
    <div id="collapseOne<?php echo   $row["id"];  ?>" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
      <div class="panel-body">

<a href="delete_menu.php?menu=<?php echo   mysqli_real_escape_string($conn,$row["id"]);   ?> "><h4><?php echo   mysqli_real_escape_string($conn,$row["item_name"]) ;  ?></h4> </a>
 
 
 
</li>
      </div>
    </div>
  </div>
   <?php
  }  }
  mysqli_free_result($result);
  ?>
   
</div>
</div>

 
  




 
 
 

<div class="col-sm-10">
   
<?php  
if ($menu_id_selected) {
  
//  $_SESSION['id'] = $menu_id_selected;
  
  
  echo "    <div class='panel panel-danger'>";
  echo "    <div class='panel-heading'>Delete Menu</div>";
  echo "    <div class='panel-body'>";
  
   
  
  $query = "SELECT * FROM `website_navbar`  WHERE id =  ".$menu_id_selected;
  $result = mysqli_query($conn, $query);
  if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
     
        echo  "           <table class='table'>   ";
    echo  "           <thead>   ";
    echo  "           <tr>   ";
    echo  "           <th>Menu name  </th>   ";
    echo  "           <th>Action</th>        ";
    echo  "           </tr>   ";
    echo  "           </thead>   ";
    echo  "           <tbody>   ";
    echo  "           <tr>   ";
    echo  "           <td><h4>" .  $row['item_name']  .  "</h4></td>   ";
      echo  "              <td> <a class='btn btn-danger ' href='http://localhost/website/public/delete_menu_sbmit.php?menu=". mysqli_real_escape_string($conn,$row["id"]) . " '>Delete</a></td> ";
    echo  "           </tr>   ";
    echo  "         </tbody>   ";
    echo  "           </table>   ";
      
    
 
    
    
    
  

  $query1 = "SELECT * FROM `pages`  WHERE   `pages`.`item_name_id`= ".$row["id"];
  $result1 = mysqli_query($conn, $query1);
  if (mysqli_num_rows($result1) > 0) {
    while($row1 = mysqli_fetch_assoc($result1)) {
  
 
      
 
echo  "           <table class='table'>   ";
echo  "           <thead>   ";
echo  "           <tr>   ";
echo  "           <th>Page name  </th>   ";
echo  "           <th>Action</th>        ";
echo  "           </tr>   ";
echo  "           </thead>   ";
echo  "           <tbody>   ";
echo  "           <tr>   ";
echo  "           <td>" .  $row1['page_name']  .  "</td>   ";
echo  "              <td> <a class='btn btn-danger' href='http://localhost/website/public/delete_page_sbmit.php?page=". mysqli_real_escape_string($conn,$row1["id"]) . " '>Delete</a></td> ";
echo  "           </tr>   ";
echo  "         </tbody>   ";
echo  "           </table>   "; 

  
  
    }}}}


    echo "        </div>   ";
    echo "        </div>   ";
    echo "      </div>   ";


} ?>
 
  


 


</div>
 
</div>



















 <?php  
include('file:///C:/wamp2/www/website/include/log/footer.php');
?>
