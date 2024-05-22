<?php
include "config.php";
session_start(); 

date_default_timezone_set('Asia/kolkata');
$user=$_SESSION['username'];

$id=$_REQUEST['id'];
$query="UPDATE users set current_class='$id' where Login_id='$user'";
$result=mysqli_query($db,$query);
if($result)
{
   $stm=mysqli_query($db,"select * from student where Login_id='$user'");
   $stm1=mysqli_query($db,"select * from teacher where Login_id='$user'");
   $s=mysqli_fetch_assoc($stm);
   $s1=mysqli_fetch_assoc($stm1);

   if($s!=NULL)
    {
    echo "<script>window.location.href='STUDENT_HOME.php';</script>";
    die();
    }

    if($s1!=NULL)
    {
    echo "<script>window.location.href='TEACHER_HOME.php';</script>";
    die();
    }
}


else
{
    echo "<script> alert('Failed!!!');</script>";
}
mysqli_close($db);
?>