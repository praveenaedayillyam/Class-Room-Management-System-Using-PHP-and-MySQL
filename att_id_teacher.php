<?php
include "config.php";
session_start(); 

date_default_timezone_set('Asia/kolkata');
$user=$_SESSION['username'];

$GLOBALS['id']=$_REQUEST['id'];
$query="UPDATE users set att_id='$id' where Login_id='$user'";
$result=mysqli_query($db,$query);
if($result)
{
    echo "<script>window.location.href='individual_att_teacher.php';</script>";
}
else
{
    echo "<script> alert('Failed!!!');</script>";
}
mysqli_close($db);
?>