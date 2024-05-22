
<?php

session_start(); 
include "refresh_prevent.js";
include "config.php";
// Starting the session, to use and 
// store data in session variable 
 



//echo $_SESSION["class_id"];
$user=$_SESSION['username'];

$z=mysqli_query($db,"SELECT * from users where Login_id='$user'");
$z1=mysqli_fetch_assoc($z);
$Email_Email=$z1['Email_id'];

$classroom=$z1["current_class"];

$a="select * from tutor where tutor_id='$classroom'";
$b=mysqli_query($db,$a);
$c=mysqli_fetch_assoc($b);


date_default_timezone_set('Asia/kolkata');

// If the session variable is empty, this 
// means the user is yet to login 
// User will be sent to 'login.php' page 
// to allow the user to login 
if (!isset($_SESSION['username'])) { 
	$_SESSION['msg'] = "You have to log in first"; 
	header('location: HOME MAIN.php'); 
} 

// Logout button will destroy the session, and 
// will unset the session variables 
// User will be headed to 'login.php' 
// after loggin out 
if (isset($_GET['logout'])) { 
	session_destroy(); 
	unset($_SESSION['username']); 
	header("location: HOME MAIN.php"); 
} 
?> 



<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css homepage.css">

<style>

.header {
  padding: 0.1px;
  text-align: center;
  background: url("yellow.JPG") fixed;
  color: rgba(179, 9, 9, 0.932);
 font-size: 15px;
 
}
body {font-family: Arial, Helvetica, sans-serif;}

</style>

</head>
<body>


<!-- Creating notification when the 
				user logs in -->
		
		<!-- Accessible only to the users that 
				have logged in already -->
        <?php if (isset($_SESSION['success'])) : ?> 
			<div class="error success" > 
				<h3> 
					<?php
						//echo $_SESSION['success']; 
						unset($_SESSION['success']); 
					?> 
				</h3> 
			</div> 
		<?php endif ?> 


  <div class="header">


  <?php if (isset($_SESSION['username'])) : ?> 
    <p align="left"> <font color="black"
    ><b> Hi
     <?php echo $_SESSION['username'];
    
    $str=$c['UG_PG']." ".$c['Department']." ".$c['Year_of_Admission'];

    $string= strtoupper($str);
     echo "<b>. Welcome to "."'".$string."'</b>";
     
     
     ?>   
   

   
 
   </b></font> </p>


    <p align="right"><a href="TEACHER_HOME.php?logout='1'"><b><font size="5px">LogOut</font></b></a>&nbsp;&nbsp;&nbsp;</p>
    <h1><b>--Class Management--</b></h1>
    <p></p>
  </div>
  <?php endif ?> 


<div class="navbar">
  <a href="profile teacher.php">My Profile</a>
  <a href="student info_teacherview.php">Students</a>
<a href="Teacher info_teacherview.php">Teachers</a>
  <div class="subnav">
    <button class="subnavbtn" name="button10">Lecture Scheduling <i class="fa fa-caret-down"></i></button>
    <div class="subnav-content1">
      <a href="LECTURE SCHEDULING upload_teacher.php">Schedule</a>
      <a href="Lecture view_teacher.php">See Scheduled Lecture</a>
      
    </div>
  </div> 
  <div class="subnav">
    <button class="subnavbtn" name="button10">Sylabus And Books <i class="fa fa-caret-down"></i></button>
    <div class="subnav-content2">
      <a href="Sylabus&books teacher view.php">View </a>
      <a href="Sylabus&books upload_teacher.php">Upload</a>
     <!-- <a href="edit sylabus&books.php">edit</a> -->
      
    </div>
  </div> 
  <div class="subnav">
    <button class="subnavbtn" name="button10">Student's Works<i class="fa fa-caret-down"></i></button>
    <div class="subnav-content3">
      <a href="studentWorks upload_teacher.php">Upload</a>
      <a href="see works_teacherview1.php">see Works</a>
      <!--<a href="edit student work upload.php">edit Works</a>-->
      
    </div>
  </div>



<div class="subnav">
    <button class="subnavbtn" name="button10">Attendence<i class="fa fa-caret-down"></i></button>
    <div class="subnav-content4">
      <a href="Attendence Teacher upload.php">Upload</a>
      <a href="see attendence_teacherview_1.php">see Attendence</a>
     
    </div>
  </div>

<a href="request_teacher.php">Messages</a>
<a href="message_teacher.php">Broadcast</a>
<a href="#">Settings</a>
</div>
</center>

<div style="padding:0 16px">
  <br><br>
</div>

</body>
</html>

