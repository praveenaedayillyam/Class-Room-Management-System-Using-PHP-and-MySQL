<?php
include 'config.php';
session_start(); 

if (!isset($_SESSION['username'])) { 
	$_SESSION['msg'] = "You have to log in first"; 
	header('location: login tutor.php'); 
} 

$id=$_REQUEST['id'];
$query="select sylabus_type,syllabus from metirials where id_no='$id'";
$result=mysqli_query($db,$query);
$row = mysqli_fetch_array($result);
header("Content-type: " . $row["sylabus_type"]);
echo $row["syllabus"];

?>