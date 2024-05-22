<?php
include "refresh_prevent.js";
include "config.php";
// Starting the session, to use and 
// store data in session variable 
session_start(); 



$user=$_SESSION['username'];

$z=mysqli_query($db,"SELECT * from users where Login_id='$user'");
$z1=mysqli_fetch_assoc($z);


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
	header('location:HOME MAIN.php'); 
} 

// Logout button will destroy the session, and 
// will unset the session variables 
// User will be headed to 'login.php' 
// after loggin out 
if (isset($_GET['logout'])) { 
	session_destroy(); 
	unset($_SESSION['username']); 
	header('location:HOME MAIN.php'); 
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

    <p align="right"><a href="HOME MAIN.php?logout='1'"><b><font size="5px">LogOut</font></b></a>&nbsp;&nbsp;&nbsp;</p>
    <h1><b>--Class Management--</b></h1>
    <p></p>
  </div>
  <?php endif ?> 


  <div class="navbar">
  <a href="My Profile student.php">My Profile</a>
<a href="Teacher info_studentview.php">Teachers</a>
<a href="Lecture view_student.php">Lecture Schedules</a>
<a href="Sylabus&books student view.php">Syllabus And Books</a>
<a href="internal(student view).php">Works&Internal</a>
<a href="Attendence view(student).php">Attendence</a>  
<a href="request_student.php">Messages</a>
<a href="message_student.php">Broadcast</a>
<a href="#">Settings</a>
</div>
</center>

<div style="padding:0 16px">
  <br><br>
</div>

</body>
</html>

