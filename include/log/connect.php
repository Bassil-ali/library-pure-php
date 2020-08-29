<?php
$loc = "localhost";
$us = "bassil";
$pass = "123";
$dbname = "wesite";
$conn = mysqli_connect($loc, $us, $pass, $dbname);

if (!$conn) {
	die("connection faild:".mysqli_connect_error());

}else {
	//echo "connected";
}
?>
 