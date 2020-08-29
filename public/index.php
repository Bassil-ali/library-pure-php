<?php 

include_once('file:///C:/wamp2/www/website/include/log/header.php');
include_once('file:///C:/wamp2/www/website/include/log/session.php');
include_once('file:///C:/wamp2/www/website/include/log/public_theme/header.php');


include_once('file:///C:/wamp2/www/website/include/log/connect.php');
include_once('file:///C:/wamp2/www/website/include/log/functions.php');
 


if (isset($_GET["menu"])) {
	$menu_id_selcted = urlencode($_GET["menu"]);
	$page_id_selcted = null;

	 
}elseif (isset($_GET["page"])){
	$page_id_selcted = urlencode($_GET["page"]);
	$menu_id_selcted = null;
	
}else{
	$menu_id_selcted = null;
	$page_id_selcted = null;
 
}


?>

<style>
body {background-color: hsla(89, 43%, 51%, 0.3);}.mycolor{
color : blue ;
}

.mm {
	height: 10px;
    width: 2px;
}
.bcontainer{
	background: gray;
	border-radius: 10px;
}
.b {
	background: gray;
	border-radius: 10px;
}
-->
.f {
	background: 	#D3D3D3;
	border-radius: 10px;
	text-align: center;
}
.
}
</style>


<body>

<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>

<ul  >
 <li  >
  <a href="#"> CMS </a></li>
 <?php 
$query = "SELECT * FROM `website_navbar` WHERE visible=1";
$result = mysqli_query($conn, $query);
if (mysqli_num_rows($result) > 0) {

          while($row = mysqli_fetch_assoc($result)) {
          	$query1 = "SELECT * FROM `pages`  WHERE visible=1 AND `pages`.`item_name_id`= ".mysqli_real_escape_string($conn,$row["id"]);
          	$result1 = mysqli_query($conn, $query1);
?>
<?php 
if (mysqli_num_rows($result1) > 0) {
	
	?>
<a  >


 
<li> <a href="http://localhost/website/public/index.php?menu=<?php echo   mysqli_real_escape_string($conn,$row["id"]);  ?> ">
<?php echo  mysqli_real_escape_string($conn,$row["item_name"]);   ?> </a></li >
<?php  }?>
 
 
 
 
             <?php 


if (mysqli_num_rows($result1) > 0) {

          while($row1 = mysqli_fetch_assoc($result1)) {
 ?>
 <ul>
               
  <li><a href="http://localhost/website/public/index.php?page=<?php echo   mysqli_real_escape_string($conn,$row1["id"]);  ?> "><h5><?php echo  mysqli_real_escape_string($conn,$row1["page_name"]);   ?> </h5></a></li>          
 </ul>
<?php
          }
          }
 
 ?>
</li>

<?php
          }
          }
  mysqli_free_result($result);
 ?>

               
</ul>

</div>

<div class="h" id="main">
   <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; Menu</span>
</div>
<div class="b">
<nav  class="collapse navbar-collapse" id="bs-navbar">
        <ul class="nav navbar-nav">
          <li> <a href="getting-started/">books</a>
          </li>
          <li> <a href="css/">BDF</a>
          </li>
          <li> <a href="components/">Components</a>
          </li>
          <li> <a href="javascript/">BEST BOOKS</a>
          </li>
          <li> <a href="customize/">ABOUT</a>
          </li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li><a href="https://themes.getbootstrap.com/" onclick="ga(&quot;send&quot;,&quot;event&quot;,&quot;Navbar&quot;,&quot;Community links&quot;,&quot;Themes&quot;)">STORY</a></li>
          <li><a href="https://expo.getbootstrap.com/" onclick="ga(&quot;send&quot;,&quot;event&quot;,&quot;Navbar&quot;,&quot;Community links&quot;,&quot;Expo&quot;)"></a></li>
          <li><a href="https://blog.getbootstrap.com/" onclick="ga(&quot;send&quot;,&quot;event&quot;,&quot;Navbar&quot;,&quot;Community links&quot;,&quot;Blog&quot;)"></a></li>
        </ul>
      </nav>
  </div>
  <br>
<div class="container">
	   <div class="bcontainer">
      	<div class="row justify-content-center">
      	  <div class="col-lg-10 text-white text-center">
      	    <h1 class="font-weight-light">Powerful <b>Documentation</b> and <p>books</p> Center!</h1>
      	  </div>
      	</div>
        <div class="row">
          <div class="col text-center">
           
          </div>
        </div>
      </div>
     </div>

     <br>
  <div class="container">
  <div class="row">
      <div class="col-sm-2">
 

</div>


<div class="col-sm-10">


<?php  
if ($menu_id_selcted) {
 
	 
	$query = "SELECT * FROM `website_navbar` WHERE visible=1 AND  id =  ".$menu_id_selcted;
	$result = mysqli_query($conn, $query);
	if (mysqli_num_rows($result) > 0) {
		 
		while($row = mysqli_fetch_assoc($result)) {

			
			if ($row["item_name"] == "group books1") {
                 
				echo '	<div class="panel panel-danger">
	<div class="panel-heading">content this book</div>
	<div class="panel-body">
	<br>
	
     '. 
      
         $f = fopen('book1.txt', 'r');

         $r = fread($f, filesize('book1.txt'));

         
     echo $r; '
	</div>
	</div>

    '
		

	;
	

			}			elseif ($row["item_name"] == "group books2") {
				echo '	<div class="panel panel-danger">
	<div class="panel-heading">About</div>
	<div class="panel-body">
	<p class="mycolor"> 
	PHP development began in 1995 when Rasmus Lerdorf wrote several Common Gateway Interface (CGI) programs in C,[11][12][13] which he used to maintain his personal homepage. He extended them to work with web forms and to communicate with databases, and called this implementation "Personal Home Page/Forms Interpreter" or PHP/FI.

PHP/FI could help to build simple, dynamic web applications. To accelerate bug reporting and to improve the code, Lerdorf initially announced the release of PHP/FI as "Personal Home Page Tools (PHP Tools) version 1.0" on the Usenet discussion group comp.infosystems.www.authoring.cgi on June 8, 1995.[14][15] This release already had the basic functionality that PHP has as of 2013. This included Perl-like variables, form handling, and the ability to embed HTML. The syntax resembled that of Perl but was simpler, more limited and less consistent.[6]

Lerdorf did not intend the early PHP to become a new programming language, but it grew organically, with Lerdorf noting in retrospect: "I don’t know how to stop it, there was never any intent to write a programming language […] I have absolutely no idea how to write a programming language, I just kept adding the next logical step on the way."[16] A development team began to form and, after months of work and beta testing, officially released PHP/FI 2 in November 1997.

The fact that PHP lacked an original overall design but instead developed organically has led to inconsistent naming of functions and inconsistent ordering of their parameters.[17] In some cases, the function names were chosen to match the lower-level libraries which PHP was "wrapping",[18] while in some very early versions of PHP the length of the function names was used internally as a hash function, so names were chosen to improve the distribution of hash values.[19] </p>
 
	</div>
	</div>
	';
				echo '	<div class="panel panel-info">
	<div class="panel-heading">About</div>
	<div class="panel-body">
	
          		<div class="container">
  
    <img class="img-responsive" src="static/img/php2.png" alt="Chania" width="460" height="345"> 
</div>
 
	</div>
	</div>
	';
			}
			
			
			else{
				echo    htmlentities($row["item_name"])   ;
			}
			

}
	}
	
	
 

}elseif ($page_id_selcted) {

		$query1 = "SELECT * FROM `pages`  WHERE visible=1 AND    id= " .$page_id_selcted ;
		$result1 = mysqli_query($conn, $query1);

		if (mysqli_num_rows($result1) > 0) {
			echo"	<div class='panel panel-info'>";
			echo"	<div class='panel-heading'>	";
			while($row1 = mysqli_fetch_assoc($result1)) {
				echo  htmlentities($row1["page_name"]) ;

				echo"	</div>";
				?>
 
 
	
  <div class="panel-body">
  <?php echo  nl2br(htmlentities($row1["content"])) ; ?>  
  </div>
 <?php echo "</div> "; ?>  
  <?php 
  }
  }
	} 
  ?>
</div>
</div>
</div>

     
</body>
</html>
  <footer class="site-footer">
      <div class="container">
      	
        <div class="row">
        	

      <div class="container">
        <div class="row">
          <div class="c"  class="col-md-8 col-sm-6 col-xs-12">
            <p class="copyright-text">Copyright &copy; 2017 All Rights Reserved by 
         <a href="#">Scanfcode</a>.
            </p>
          </div>

          <div  class="c" class="col-md-4 col-sm-6 col-xs-12">
            <ul class="social-icons">
              <li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
              <li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
              <li><a class="dribbble" href="#"><i class="fa fa-dribbble"></i></a></li>
              <li><a class="linkedin" href="#"><i class="fa fa-linkedin"></i></a></li>   
            </ul>
          </div>
        </div>
    </div>
      </div>
</footer>


 <?php  
include("file:///C:/wamp2/www/website/include/log/public_theme/footer.php");

?>
