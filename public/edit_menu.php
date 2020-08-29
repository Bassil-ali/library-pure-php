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
        </div>
      </div>
    </nav>
 <div class="container theme-showcase" role="main">
  <div class="jumbotron">
        <h1>edit menu</h1>
        <p>click anything to editing him</p>

       
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

<a href="http://localhost/website/public/edit_menu.php?menu=<?php echo   mysqli_real_escape_string($conn,$row["id"]);   ?> "><h4><?php echo   mysqli_real_escape_string($conn,$row["item_name"]) ;  ?></h4> </a>
 
 <?php 
$query1 = "SELECT * FROM `pages`  WHERE   `pages`.`item_name_id`= ".$row["id"];
$result1 = mysqli_query($conn, $query1);
if (mysqli_num_rows($result1) > 0) {
while($row1 = mysqli_fetch_assoc($result1)) {
?>

<ul   >
<li><a href="http://localhost/website/public/edit_menu.php?page=<?php echo   mysqli_real_escape_string($conn,$row1["id"]);  ?> "><h5><?php echo    mysqli_real_escape_string($conn,$row1["page_name"]) ;  ?> </h5></a></li>
</ul>

<?php
 }  }
   ?>
 
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
if ($menu_id_selcted) {
  
  $_SESSION['id'] = $menu_id_selcted;
  
  
  echo "    <div class='panel panel-danger'>";
  echo "    <div class='panel-heading'>Edit Menu</div>";
  echo "    <div class='panel-body'>";
  
  echo "    <form method='post' action='http://localhost/website/public/edit_sbmit.php'>";
  
  $query = "SELECT * FROM `website_navbar`  WHERE id =  ".$menu_id_selcted;
  $result = mysqli_query($conn, $query);
  if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
     
  
 
 

  echo "     <div class='form-group'>     ";   
  echo  "     <label for='text'  >Menu name: " .  $row['item_name']  .  "</label>  ";
  echo "       <div class='input-group'>   ";
  echo "        <span class='input-group-addon'><i class='glyphicon glyphicon-user'></i></span>  ";
  echo "        <input id='text' type='text' class='form-control' name='menu' placeholder='menu' value='".  $row['item_name']   ."'>  ";
  echo "      </div> ";
  echo "      </div>  ";
  
  echo "      <div class='form-group'>   ";
  echo "     <div class='radio'>   ";
  echo "      <label for='text'>Visible : </label>   ";
  
  if ( $row['visible'] ==1) {
    
    echo "      <label><input type='radio' name='optradio' value='1'    checked >Yes</label>   "; 
      echo "       <label><input type='radio' name='optradio'  value='0'>No</label>   ";
  }else {
    echo "      <label><input type='radio' name='optradio' value='1'  >Yes</label>   ";
    echo "       <label><input type='radio' name='optradio'  value='0'    checked >No</label>   ";
  }
  
  echo "     </div>   ";
    echo "     </div>   ";
 
  echo "      <div class='form-group'>   ";
  echo "      <label for='sel1'>Rank :  ("   . $row['rank'] . ") </label>   ";
  echo "      <select class='form-control' id='sel1' name='rank'>     ";
  
    }} ?>
  
  <?php 
  
  $query = "SELECT rank FROM `website_navbar`  ";
  $result = mysqli_query($conn, $query);
  $row_cnt = mysqli_num_rows($result); 
 for ($i =1; $i <= $row_cnt+1 ; $i++) {
  

?>
   
<option  value="<?php  echo $i ; ?>">  <?php  echo $i ; ?>  </option>
 
 
 <?php    } ?>
 <?php  
  echo "      </select>   ";
  echo "     </div>    ";
  echo "       <button type='submit' class='btn btn-default' name='submit' data-toggle='modal' data-target='#myModal'>Submit</button>   ";



  echo "        </form>   ";
 
  echo "        </div>   ";
  echo "        </div>   ";
    echo "      </div>   ";
  

} ?>
 




<?php  
if ($page_id_selcted) {
  
  $_SESSION['id'] = $page_id_selcted;
   

  $query = "SELECT * FROM `pages`  WHERE id =  ".$page_id_selcted;
  $result = mysqli_query($conn, $query);
  if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
  
  
  
  echo "
 <div class='panel panel-danger'>
  <div class='panel-heading'>Create new Page</div>
  <div class='panel-body'>
  
  <form method='post' action='http://localhost/website/public/edit_pages_sbmit.php'>
  <div class='form-group'>
  <label for='text'>Page name:   {$row['page_name']} </label>
  <div class='input-group'>
  
    <span class='input-group-addon'><i class='glyphicon glyphicon-user'></i></span>
    <input id='text' type='text' class='form-control' name='page' value='{$row['page_name']}'>
  </div>
  </div>
  
  <div class='form-group'>
<div class='radio'>
  <label for='text'>Visible : </label>  ";
    if ( $row['visible'] ==1) {
    
    echo "      <label><input type='radio' name='optradio' value='1'    checked >Yes</label>   "; 
      echo "       <label><input type='radio' name='optradio'  value='0'>No</label>   ";
  }else {
    echo "      <label><input type='radio' name='optradio' value='1'  >Yes</label>   ";
    echo "       <label><input type='radio' name='optradio'  value='0'    checked >No</label>   ";
  }
  echo " </div>";
  echo "   </div>
  
  <div class='form-group'>
<div class='radio'>
  <label for='text'>Status : </label>";
      if ( $row['status'] ==1) {
    
    echo "      <label><input type='radio' name='optradio1' value='1'    checked >Yes</label>   "; 
      echo "       <label><input type='radio' name='optradio1'  value='0'>No</label>   ";
  }else {
    echo "      <label><input type='radio' name='optradio1' value='1'  >Yes</label>   ";
    echo "       <label><input type='radio' name='optradio1'  value='0'    checked >No</label>   ";
  }
  echo " </div>";
  echo "   </div>
  
  <div class='form-group'>
  <label for='comment'>Content:</label>
  <textarea class='form-control' rows='5' name='content'>". $row['content']  ."</textarea>
  </div>
  
  
  <div class='form-group'>
  <label for='sel1'>Rank : ".$row['rank']." </label>
  <select class='form-control' id='sel1' name='rank'>
";
    
  $query1 = "SELECT `rank` FROM `pages` WHERE `item_name_id`   =".$row['item_name_id'];
  $result1 = mysqli_query($conn, $query1);
  $row_cnt = mysqli_num_rows($result1);
  
  for ($i =1; $i <= $row_cnt ; $i++) {
  
  
  
     
    echo "<option  value=" .   $i ." '>  ".  $i ."  </option>";
  
  
  }
  
  echo "
  </select>
</div>";
 
  echo"<div class='checkbox'>";
  $query2 = "SELECT `id`, `item_name` FROM `website_navbar`  ";
  $result2 = mysqli_query($conn, $query2);
  if (mysqli_num_rows($result2) > 0) {
    while($row2 = mysqli_fetch_assoc($result2)) {
      
      
      if ( $row2['id'] ==$row['item_name_id']) {
        echo "<label><input type='checkbox' name='checkbox' checked";
      
      }else{
        echo "<label><input type='checkbox' name='checkbox'  ";
      }
      
    echo "  value='{$row2['id']}'> {$row2['item_name']} </label> &nbsp;&nbsp;";

      }}
      
  } }
  
  echo "      </div> ";
  
  
  
  
  echo "       <button type='submit' class='btn btn-default' name='submit' data-toggle='modal' data-target='#myModal'>Submit</button>   ";
  
  
  echo "   </form>
  
  
  
  </div>
</div>
   ";
  echo "        </div>   ";

}

?>

  
</div>
 
</div>

    <?php

include('file:///C:/wamp2/www/website/include/log/footer.php');
?>
 