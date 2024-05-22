<?php

include 'config.php';
session_start(); 

if (!isset($_SESSION['username'])) { 
	$_SESSION['msg'] = "You have to log in first"; 
	header('location: HOME MAIN.php'); 
} 

$user=$_SESSION['username'];
$query="select photo_type,photo from student where Login_id='$user'";
$result=mysqli_query($db,$query);
$row = mysqli_fetch_array($result);
header("Content-type: " . $row["photo_type"]);
echo $row["photo"];

?>