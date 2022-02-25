<?php
include("../dbconnect.php");
session_start();
	$img=$_SESSION['img'];
	$img2=$_SESSION['img2'];

$md5image1 = md5(file_get_contents($img));
$md5image2 = md5(file_get_contents($img2));
if($md5image1 == $md5image2){
	echo "same";
}
else{
	echo "try another";
}
?>
